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
    public partial class EditMember : Form
    {
        int teamId;
        AddMember _parent;
        public EditMember(int Id,AddMember parent)
        {
            teamId = Id;
            _parent = parent;
            InitializeComponent();
            ReadRole();
        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void ReadRole()
        {
            SqlConnection con = null;
            try
            {
                con = new SqlConnection("data source=DESKTOP-GK4L3Q4\\SQLEXPRESS; database=Organization; integrated security=SSPI");
                SqlDataAdapter cm = new SqlDataAdapter("SELECT * FROM Role", con);
                con.Open();

                DataSet ds = new DataSet();
                cm.Fill(ds, "Role");

                Dictionary<int,string> cs = new Dictionary<int,string>();
                for (int i = 0; i < ds.Tables[0].Rows.Count; i++)
                {
                    try
                    {

                        DataRow r = ds.Tables[0].Rows[i];
                        cs.Add(r.Field<Int32>(0), r.Field<String>(1));

                    }
                    catch (Exception ex)
                    {
                        Console.WriteLine(ex);
                    }
                }

                comboBox1.DataSource = new BindingSource(cs, null);
                comboBox1.DisplayMember = "Value";
                comboBox1.ValueMember = "Key";

                //var data = ds.Tables["Role"].DefaultView[0].Row.ItemArray[1];
                //var data = ds.Tables["Role"].Rows[0];
                //var data = ds.Tables["Role"].DefaultView.to.Select(s=>s.Row);
                //comboBox1.DataSource = ds.Tables["Role"].Rows[0];
                //comboBox1.DataSource = data;
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

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection con = null;
            try
            {
                con = new SqlConnection("data source=DESKTOP-GK4L3Q4\\SQLEXPRESS; database=Organization; integrated security=SSPI");
                SqlCommand cm = new SqlCommand("insert into Member (FirstName, LastName, TeamId, RoleId) values (@f, @l, @t, @r)", con);
                cm.Parameters.Add("@f", System.Data.SqlDbType.NVarChar, 100).Value = textBox1.Text;
                cm.Parameters.Add("@l", System.Data.SqlDbType.NVarChar, 100).Value = textBox2.Text;
                cm.Parameters.Add("@t", System.Data.SqlDbType.NVarChar, 100).Value = teamId;
                cm.Parameters.Add("@r", System.Data.SqlDbType.NVarChar, 100).Value = comboBox1.SelectedIndex+1;

                con.Open();
                cm.ExecuteNonQuery();
                _parent.ReadData();
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
