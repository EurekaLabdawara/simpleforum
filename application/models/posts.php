<?php
class Posts extends CI_Model
{

    public function get_posts()
    {
        //mengambil semua data post yang ada di table post

        $query = $this->db->get('posts');
        return $query->result();
    }

    public function insert_post($input)
    {
        //membuat data post baru 
        $this->db->insert('posts', $input);
    }

    public function update_post($input)
    {
        //mengubah data post yang dicari / dipilih

        $this->db->set('author', $input['author']);
        $this->db->set('deskripsi', $input['deskripsi']);
        $this->db->where('idPost', $input['id']);
        $this->db->update('posts');
    }

    public function delete_post($id)
    {
        // menghapus post yang dipilih

        $this->db->where('idPost', $id);
        $this->db->delete('posts');
    }
}