<?php 
namespace App\Modules\Eth_network\Models\Admin;

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
        if ($net == 'eth') {
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (null, 'ETHEREUM', 'eth', NULL, 'https://mainnet.infura.io/v3/1913a8567db645fdac901f8c7e9c0015', 1, 'ETH', 'https://etherscan.io/', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }
        else if($net == 'ropsten'){
            $result = $this->db->query("INSERT INTO `dbt_blockchain_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES (null, 'Ropsten (Ethereum testnet)', 'ropsten', NULL, 'https://ropsten.infura.io/v3/1913a8567db645fdac901f8c7e9c0015', 3, 'ETH', 'https://ropsten.etherscan.io/', 81, 'localhost', NULL, NULL, 1)")->getResult();
            return true;
        }
    }
 
}
