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
    public partial class AddMember : Form
    {
        int teamId;
        public AddMember(object o)
        {
            InitializeComponent();
            teamId = int.Parse(o.ToString());
        }

        private void button1_Click(object sender, EventArgs e)
        {
            EditMember edMem = new EditMember(teamId,this);
            edMem.ShowDialog();
        }

        private void AddMember_Load(object sender, EventArgs e)
        {
            ReadData();
        }

        public void ReadData()
        {
            SqlConnection con = null;
            try
            {
                con = new SqlConnection("data source=DESKTOP-GK4L3Q4\\SQLEXPRESS; database=Organization; integrated security=SSPI");
                SqlDataAdapter cm = new SqlDataAdapter($"SELECT * FROM Member where TeamId = {teamId}", con);
                //cm.Parameters.Add("@t", SqlDbType.Int).Value = teamId;
                con.Open();

                DataSet ds = new DataSet();
                cm.Fill(ds, "Member");
                dataGridView1.DataSource = ds.Tables["Member"].DefaultView;
            }
            catch (Exception ex)
            {
                Console.WriteLine("OOPs, something went wrong." + ex);
            }

            finally
            {
                con.Close();
            }
        }
    }
}
