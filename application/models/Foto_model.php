<?php
class Foto_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert('foto', $data);
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('foto', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('foto');
    }

    public function select($id = null)
    {
        if ($id === null) {
            $query = $this->db->get('foto');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('foto', ['id' => $id]);
            return $query->row_array();
        }
    }

    public function get_image($id)
    {
        $query = $this->db->get_where('foto', ['id' => $id]);
        $result = $query->row_array();
        return unserialize($result['gambar']);
    }
}
