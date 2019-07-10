<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Process_model extends CI_Model
{
	function getquery()
	{
		$query = array();
		$query_json = FCPATH.WORKFILES.QUERY_IN;
		$result = array();
		if( file_exists( $query_json ) )
		{
			$query_data = file_get_contents( $query_json );
			$query = json_decode( $query_data,1 );
			if( is_array( $query ) && !empty( $query ) && count( $query ) != 0 )
			{
				foreach ($query as $qkey => $qval) 
				{
					$query_result = $this->getqueryresult( $qval['name'] );
					$qval['q_result'] = $query_result;
					$result[] = $qval;
				}
			}
		}
		return $result;
	}

	function getqueryresult( $queryname )
	{
		$date = date('Ymd');
		$query_result = array();
		$file_opt = FCPATH.WORKFILES.QUERY_OUT.$date;
		if( file_exists( $file_opt ) )
		{
			$file_name = $file_opt.'/'.$queryname.'.json';
			if( file_exists( $file_name ) )
			{
				$file_result = file_get_contents( $file_name );
				$query_result = array_reverse(json_decode( $file_result,1 ));
			}
		}
		return $query_result;
	}

	function getresult( $data )
	{
		$query_json = FCPATH.WORKFILES.QUERY_IN;
		if( file_exists( $query_json ) )
		{
			$query_data = file_get_contents( $query_json );
			$query = json_decode( $query_data,1 );
			$date = date('Ymd');
			$file_opt = FCPATH.WORKFILES.QUERY_OUT.$date;
			$ins_array = array();
			$resp = array();
			if( !file_exists( $file_opt ) )
			{
				mkdir($file_opt, 0777, true);
			}
			if( is_array( $query ) && !empty( $query ) && count( $query ) != 0 )
			{
				foreach ($query as $qkey => $qval) 
				{
					if( $qval['id'] == $data['query_id'] )
					{
						if( file_exists( $file_opt.'/'.$qval['name'].'.json' ) )
						{
							$ins_array = file_get_contents(  $file_opt.'/'.$qval['name'].'.json' );
							$ins_array = json_decode( $ins_array,1 );
						}
						$runQ = $this->db->query( $qval['query'] );
						$result_q = $runQ->result_array();
						if( $result_q )
						{
							$resp = array('id' => $data['query_id'],'query_name' => $qval['name'],'query'=> $qval['query'],'result' => json_encode( $result_q ),'time'=> time(),"date" => date('Y-m-d h:i:s A'),'status' => 1);
							array_push($ins_array, $resp);
						}
						else
						{
							$error = $this->db->error(); 
							$resp = array('id' => $data['query_id'],'query_name' => $qval['name'],'query'=> $qval['query'],'result' => json_encode( $error ),'time'=> time(),"date" => date('Y-m-d h:i:s A'),'status' => 2);
							array_push($ins_array, $resp);
						}
						if( file_put_contents($file_opt.'/'.$qval['name'].'.json', json_encode( $ins_array )) )
						{
							return array('code' => 1,'msg' => '','data' => $resp);
						}
						else
						{
							return array('code' => 2,'msg' => 'Error while saving data');
						}
					}
				}
			}
			else
			{
				return array('code' => 2,'msg' => 'There is no input data');
			}
			// $runQ = $this->db->query(  )
		}
	}
}