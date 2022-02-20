using System.Data;
using System.Data.SqlClient;

namespace Organization
{

    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            ReadData();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            AddTeam addTeam = new AddTeam(this);
            addTeam.ShowDialog();
        }

        public void ReadData()
        {
            SqlConnection con = null;
            try
            { 
                con = new SqlConnection("data source=DESKTOP-GK4L3Q4\\SQLEXPRESS; database=Organization; integrated security=SSPI");
                SqlDataAdapter cm = new SqlDataAdapter("SELECT * FROM Team", con);
                con.Open();
             
                DataSet ds = new DataSet();
                cm.Fill(ds, "Team");
                dataGridView1.DataSource = ds.Tables["Team"].DefaultView;
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

        private void button2_Click(object sender, EventArgs e)
        {
            SqlConnection con = null;
            try
            {
                con = new SqlConnection("data source=DESKTOP-GK4L3Q4\\SQLEXPRESS; database=Organization; integrated security=SSPI");
                SqlCommand cm = new SqlCommand("delete from Team where TeamID =  @t", con);
                cm.Parameters.Add("@t", System.Data.SqlDbType.NVarChar, 100).Value = dataGridView1.SelectedCells[0].Value;

                con.Open();
                cm.ExecuteNonQuery();
                this.ReadData();
                            
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

        private void dataGridView1_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            AddMember addMem = new AddMember(dataGridView1.SelectedCells[0].Value);
            addMem.ShowDialog();

        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }
    }

}