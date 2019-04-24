<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SimpleForum extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        // laod model
        $this->load->model('posts');

        //ambil data
        $data['posts'] = $this->posts->get_posts();
        // $check = ($data === NULL) ? "Data Not Found" : "Data has found";
        // print_r($data['posts'][0]->author);

        //untuk menampilkan
        $this->load->view('main_view', $data);
    }

    public function createpost()
    {
        //membuat data post baru
        $input = $this->input->post();
        print_r($input);
        //load model
        $this->load->model('posts');

        $this->posts->insert_post($input);
        // //untuk menampilkan

        redirect(base_url());
    }

    public function updatepost()
    {
        //mendapatkan data
        $input = $this->input->post();
        // print_r($input);

        //mengubah data post yang dicari / dipilih

        // //load model
        $this->load->model('posts');

        // // update
        $this->posts->update_post($input);

        redirect(base_url());
    }

    public function deletepost()
    {
        // menghapus post yang dipilih

        $id = $this->input->get()['id'];

        //load model
        $this->load->model('posts');

        //delete
        $this->posts->delete_post($id);

        redirect(base_url());
    }
}