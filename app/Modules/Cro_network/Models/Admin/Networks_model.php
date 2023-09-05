<?php 
namespace App\Modules\Cro_network\Models\Admin;

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
        if ($net == 'cro') {
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (null, 'Cronos', 'cro', NULL, 'https://evm-cronos.crypto.org', 25, 'CRO', 'https://cronos.crypto.org/explorer/', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }
        else if($net == 'cro-testnet'){
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (null, 'Cronos Testnet', 'cro-testnet', NULL, 'https://cronos-testnet-3.crypto.org:8545', 338, 'TCRO', 'https://cronos.crypto.org/explorer/testnet3', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }



    }
 
}
