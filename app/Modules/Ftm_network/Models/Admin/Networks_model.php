<?php 
namespace App\Modules\Ftm_network\Models\Admin;

class Networks_model  {
    
    public function __construct(){
        $this->db = db_connect();
        $this->request = \Config\Services::request();
    }

    public function where_row($table,$where=array())
    {
        $builder=$this->db->table($table);
        return $builder->select("*")
                ->where($where)
                ->get()
                ->getRow();
    }

    public function where_rows($table,$where=array(), $field=NULL, $opt=NULL)
    {
        $builder=$this->db->table($table);
        return $builder->select("*")
                ->where($where)
                ->orderBy($field, $opt)
                ->get()
                ->getResult();
    }

    public function update($table=NULL, $where=[], $data=[])
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        return $builder->update($data);
    }


    public function activateNetwork($net)
    {
        if ($net == 'ftm') {
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (NUll, 'Fantom Opera', 'ftm', NULL, 'https://rpc.ankr.com/fantom/', 250, 'FTM', 'https://ftmscan.com/', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }
        else if($net == 'ftm-testnet'){
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (NULL, 'Fantom Testnet', 'ftm-testnet', NULL, 'https://rpc.testnet.fantom.network/', 4002, 'FTM', 'https://testnet.ftmscan.com/', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }
        return false;
    } 
 
}
