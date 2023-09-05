<?php 
namespace App\Modules\Klay_network\Models\Admin;

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
        if ($net == 'klay') {
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (null, 'Klaytn', 'klay', NULL, 'https://public-node-api.klaytnapi.com/v1/cypress', 8217, 'KLAY', 'https://scope.klaytn.com', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }
        else if($net == 'klay-testnet'){
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (null, 'Klaytn (Baobab Testnet)', 'klay-testnet', NULL, 'https://api.baobab.klaytn.net:8651', 1001, 'KLAY', 'https://baobab.scope.klaytn.com', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }



    }
 
}
