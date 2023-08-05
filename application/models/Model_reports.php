<?php 

class Model_reports extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	// Method to get the stock quantity for a given product name from the 'brands' table
    public function getStockQuantity($product_name)
    {
        $query = $this->db->get_where('brands', array('name' => $product_name));
        $result = $query->row_array();

        // Return the stock quantity if the product is found in the 'brands' table
        return ($result) ? $result['qty'] : 0;
    }
	// Method to get the waste quantity for a given product name from the 'category' table
    public function getWasteQuantity($product_name)
    {
        $query = $this->db->get_where('category', array('name' => $product_name));
        $result = $query->row_array();

        // Return the waste quantity if the product is found in the 'category' table
        return ($result) ? $result['qty'] : 0;
    }

	/*getting the total months*/
	private function months()
	{
		return array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
	}

	/* getting the year of the orders */
	public function getOrderYear()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		$result = $query->result_array();
		
		$return_data = array();
		foreach ($result as $k => $v) {
			$date = date('Y', $v['date_time']);
			
			$return_data[] = $date;
		}

		$return_data = array_unique($return_data);

		return $return_data;
	}

	// getting the order reports based on the year and moths
	public function getOrderData($year)
	{	
		if($year) {
			$months = $this->months();
			
			$sql = "SELECT * FROM orders WHERE paid_status = ?";
			$query = $this->db->query($sql, array(1));
			$result = $query->result_array();

			$final_data = array();
			foreach ($months as $month_k => $month_y) {
				$get_mon_year = $year.'-'.$month_y;	

				$final_data[$get_mon_year][] = '';
				foreach ($result as $k => $v) {
					$month_year = date('Y-m', $v['date_time']);

					if($get_mon_year == $month_year) {
						$final_data[$get_mon_year][] = $v;
					}
				}
			}	


			return $final_data;
			
		}
	}
}