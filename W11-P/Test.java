package DB;

import java.sql.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;

public class Test {
    private static String className = "oracle.jdbc.driver.OracleDriver";
    private static String url = "jdbc:oracle:thin:@localhost:1522:xe";
    private static String user = "hr";
    private static String password = "1234";

    public Connection getConnection() {
        Connection conn = null;

        try {
            Class.forName(className);
            conn = DriverManager.getConnection(url, user, password);
            System.out.println("connection success");
        } catch (ClassNotFoundException cnfe) {
            System.out.println("failed db driver loading\n" + cnfe.toString());
        } catch (SQLException sqle) {
            System.out.println("failed db connection\n" + sqle.toString());
        } catch (Exception e) {
            System.out.println("Unknown error");
            e.printStackTrace();
        }
        return conn;
    }

    public void closeAll(Connection conn, PreparedStatement pstm, ResultSet rs) {
        try {
            if (rs != null) rs.close();
            if (pstm != null) pstm.close();
            if (conn != null) conn.close();
            System.out.println("All closed");
        } catch (SQLException sqle) {
            System.out.println("Error!!");
            sqle.printStackTrace();
        }
    }

    private void select() {
        Connection conn = null;
        PreparedStatement pstm = null;
        ResultSet rs = null;
        String sql = "SELECT * FROM (SELECT * FROM jobs ORDER BY rownum DESC) WHERE rownum = 1";

        // 오라클에 쿼리 전송 및 결과값 반환
        try {
            conn = this.getConnection();
            pstm = conn.prepareStatement(sql);
            rs = pstm.executeQuery();

            while(rs.next()) {
                System.out.print("job_id: " + rs.getString("job_id"));
                System.out.print("\tjob_title: " + rs.getString("job_title"));
                System.out.print("\tmin_salary: " + rs.getString("min_salary"));
                System.out.println("\tmax_salary: " + rs.getString("max_salary"));
            }
        } catch(SQLException e) {
            e.printStackTrace();
        } finally {
            this.closeAll(conn, pstm, rs);
        }
    }

    private void update() {
        Connection conn = null;
        PreparedStatement pstm = null;
        String sql = "UPDATE jobs SET min_salary = 6000 WHERE job_title = 'Cloud Engineer'";
        // 오라클에 쿼리 전송 및 결과값 반환
        try {
            conn = this.getConnection();
            pstm = conn.prepareStatement(sql);
            int count = pstm.executeUpdate(sql);
            System.out.println(count + " row updated");
        } catch(SQLException e) {
            e.printStackTrace();
        } finally {
            this.closeAll(conn, pstm, null);
        }
    }

    private void insert() {
        Connection conn = null;
        PreparedStatement pstm = null;
        String sql = "INSERT INTO jobs VALUES ('IT_ENGI', 'Cloud Engineer', 4500, 13000)";
        try {
            conn = this.getConnection();
            pstm = conn.prepareStatement(sql);
            int count = pstm.executeUpdate(sql);
            System.out.println(count + " row inserted");
        } catch(SQLException e) {
            e.printStackTrace();
        } finally {
            this.closeAll(conn, pstm, null);
        }
    }

    private void delete() {
        Connection conn = null;
        PreparedStatement pstm = null;
        String sql = "DELETE FROM jobs WHERE job_title = 'Cloud Engineer'";
        try {
            conn = this.getConnection();
            pstm = conn.prepareStatement(sql);
            int count = pstm.executeUpdate(sql);
            System.out.println(count + " row deleted");
        } catch(SQLException e) {
            e.printStackTrace();
        } finally {
            this.closeAll(conn, pstm, null);
        }
    }

    public static void main(String[] args) {
        Test so = new Test();
        so.select();
        so.insert();
        so.select();
        so.update();
        so.select();
        so.delete();
        so.select();

    }
}
