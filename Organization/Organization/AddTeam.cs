using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Organization
{
    public partial class AddTeam : Form
    {
        Form1 F1;
        public AddTeam(Form1 form1)
        {
            F1 = form1;
            InitializeComponent();
        }


        private void button1_Click(object sender, EventArgs e)
        {
            // InsertTeam();
            SqlConnection con = null;
            try
            {
                con = new SqlConnection("data source=DESKTOP-GK4L3Q4\\SQLEXPRESS; database=Organization; integrated security=SSPI");
                SqlCommand cm = new SqlCommand("insert into Team (TeamName, TeamLeader) values (@t, @l)", con);
                cm.Parameters.Add("@t",System.Data.SqlDbType.NVarChar, 100).Value = textBox1.Text;
                cm.Parameters.Add("@l",System.Data.SqlDbType.NVarChar, 100).Value = textBox2.Text;

                con.Open();
                cm.ExecuteNonQuery();
                F1.ReadData();
                this.Close();
            }
            catch (Exception ex)
            {
                Console.WriteLine("OOPs, something went wrong." + ex);
            }
            // Closing the connection  
            finally
            {
                con.Close();
            }
        }
    }
}
