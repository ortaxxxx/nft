<?php 
namespace App\Modules\Avalanche_network\Models\Admin;

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
        if ($net == 'avalanche') {
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (3, 'Avalanche Mainnet C-Chain', 'avalanche', NULL, 'https://api.avax.network/ext/bc/C/rpc', 43114, 'AVAX', 'https://snowtrace.io/', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }
        else if($net == 'avalanche-testnet'){
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (4, 'Avalanche FUJI C-Chain testnet', 'avalanche-testnet', NULL, 'https://api.avax-test.network/ext/bc/C/rpc', 43113, 'AVAX', 'https://testnet.snowtrace.io/', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }
        return false;
    } 

 
}
