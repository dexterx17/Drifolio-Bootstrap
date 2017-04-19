import java.util.Calendar;
import java.util.Date;
import java.util.ArrayList;
import java.sql.*;
import java.text.*;

/**
 * Compilar con javac Main.java y ejecutar con java -classpath ".:sqlite-jdbc-3.8.7.jar" Main 
 */
public class Main {

	static ArrayList<Object> list;

	public static void main(String[] args){
		Calendar c;
		Calendar c2;

		out("Fecha actual  : ");
		c = Calendar.getInstance();
		outn(c.getTime());
		outn("");
		int dia_semana = c.get(Calendar.DAY_OF_WEEK);
		out("Dia de la semana :");
		outn(dia_semana);
		outn("");
		
		out("Inicio semana  : ");
		c.add(Calendar.DATE,-dia_semana);
		outn(c.getTime());

		out("Fin de semana  : ");

		outn("");
		c.add(Calendar.MONTH,-1);

		out("Inicio mes anterior  : ");
		c2 = Calendar.getInstance();
		c2.set(c2.get(Calendar.YEAR),c.get(Calendar.MONTH),c.getActualMinimum(Calendar.DAY_OF_MONTH),c2.get(Calendar.HOUR_OF_DAY),c2.get(Calendar.MINUTE),c2.get(Calendar.SECOND));
		outn(c2.getTime());

		out("Fin de mes anterior  : ");
		c2.set(c2.get(Calendar.YEAR),c.get(Calendar.MONTH),c.getActualMaximum(Calendar.DAY_OF_MONTH),c2.get(Calendar.HOUR_OF_DAY),c2.get(Calendar.MINUTE),c2.get(Calendar.SECOND));
		outn(c2.getTime());
		outn("");

		select();

		resultado();
	}

	/**
	 * Consulta la bdd sqlite3 e inicializar el 'list' con las transacciones y sus cabeceras
	 */
	public static void select(){
		Connection con = null;
		Statement query = null;
		try{

			Class.forName("org.sqlite.JDBC");
			con = DriverManager.getConnection("jdbc:sqlite:ahorrando.sqlite3");
			query = con.createStatement();

			ResultSet rs = query.executeQuery("SELECT * FROM transaccion ORDER BY fecha");

			//Lista para almacenar las transacciones y sus cabeceras
			list = new ArrayList<Object>();

			Calendar c = Calendar.getInstance();
			double total_mes=0;
			int mes_actual = c.get(Calendar.MONTH);
			int n_transaccion = 0;
			int ultimo_mes=0;
			int mes_transaccion=0;
			Cabecera cabecera =new Cabecera(String.valueOf(mes_actual),0);

			while(rs.next()){
				int id = rs.getInt("id");
				String descripcion = rs.getString("descripcion");
				double valor = rs.getDouble("valor");
				Date fecha = new SimpleDateFormat("yyyy-MM-dd").parse(rs.getString("fecha"));
				SimpleDateFormat month_date = new SimpleDateFormat("MMMM");

				//getDisplayName(MONTH, LONG, Locale.US)
  				c.setTime(fecha);

				
				mes_transaccion = c.get(Calendar.MONTH);
				
				if (n_transaccion==0){

					cabecera.descripcion=month_date.format(fecha);
					list.add(cabecera);
					ultimo_mes=mes_transaccion;
				}else{
					if (ultimo_mes!=mes_transaccion ){
						ultimo_mes=mes_transaccion;
						cabecera= new Cabecera(month_date.format(fecha),valor);
						list.add(cabecera);
					}
				}
				cabecera.total+=valor;

				//Creo un objeto tipo transaccion
				Transaccion transaccion = new Transaccion(id,descripcion,fecha,valor);
				//Verificar a que seccion pertenece la fecha de la transaccion

				//Agrego la transaccion al grupo que pertenece
				list.add(transaccion);
				n_transaccion++;
			}

			rs.close();
			query.close();
			con.close();

		}catch(Exception e){
			outn(e.getClass().getName() + ": " + e.getMessage() );
			System.exit(0);
		}
	}

	/**
	 * Recorre la lista de objetos para imprimir el resultado
	 *
	 *   Mes - (total)
	 *    Semana # [# - #] (total)
	 *  ----row transaccion
	 *  ----row transaccion
	 *  ----row transaccion
	 *    Semana # (total)
	 *  ----row transaccion
	 *  ----row transaccion
	 *  ----row transaccion
	 *   Mes - (total)
	 *    Semana # (total)
	 *  ----row transaccion
	 *  ----row transaccion
	 *  ----row transaccion
	 *    Semana # (total)
	 *  ----row transaccion
	 *  ----row transaccion
	 *  ----row transaccion
	 */
	public static void resultado(){
		//recorro la lista de objetos
		for (int i=0;i<list.size() ;i++ ) {
			Object objeto = list.get(i);
			//Si el objeto es de tipo transaccion imprimo la fila
			if(objeto instanceof Transaccion){
				((Transaccion)objeto).imprimir();
			}
			//Caso contrario imprimo la cabecera
			else
			{
				((Cabecera)objeto).imprimir();
			}
		}
	}

	public static void out(Object cadena){
		System.out.print(cadena);
	}

	public static void outn(Object cadena){
		System.out.println(cadena);
	}

}

/**
 * Objeto que mapea una transaccion de la 'transacciones'
 */
class Transaccion{

	private int id;
	private String descripcion;
	private Date fecha;
	private double valor;

	public Transaccion(int id, String descripcion, Date fecha, double valor){
		this.id=id;
		this.descripcion = descripcion;
		this.fecha = fecha;
		this.valor = valor;
	}

	/**
	 * Imprime una fila con la info de la transaccion
	 */
	public void imprimir(){
		System.out.println(this.id+":\t"+this.fecha+"\t\t"+this.descripcion+"\t\t"+this.valor);
	}
}

class Cabecera{
	public double total;
	public String descripcion;

	public Cabecera(String descripcion, double total){
		this.total=total;
		this.descripcion=descripcion;
	}

	/**
	 * Imprime una fila con la info de la transaccion
	 */
	public void imprimir(){
		System.out.println(this.descripcion+"\t : \t\t"+this.total);
	}
}