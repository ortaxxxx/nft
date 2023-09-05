<?php 
namespace App\Modules\Bsc_network\Models\Admin;

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
        if ($net == 'bsc') {
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (3, 'Binance Smart Chain', 'bsc', NULL, 'https://bsc-dataseed1.binance.org', 56, 'BNB', 'https://bscscan.com/', 81, 'localhost', '2022-08-24 05:51:26', NULL, 1)")->getResult();
            return true;
        }
        else if($net == 'bsc-testnet'){
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (4, 'Binance Smart Chain Testnet', 'bsc-testnet', NULL, 'https://data-seed-prebsc-1-s2.binance.org:8545', 97, 'BNB', 'https://testnet.bscscan.com/', 81, 'localhost', '2022-08-24 05:51:26', NULL, 1)")->getResult();
            return true;
        }
    }
 
}
