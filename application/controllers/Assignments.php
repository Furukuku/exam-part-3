<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignments extends CI_Controller {
    /**
     * Initialize the select option of tracks
     */
    private $tracks = array("Introduction", "Web Fundamentals", "PHP");

    /**
     * Loads the assignment model
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("Assignment");
    }

    /**
     * Displays the index page
     * @return void Renders the index view
     */
    public function index() {
        $this->load->view("assignments/index");
    }

    /**
     * Displays the all the assignments
     * @return void Renders the assignment list
     */
    public function indexHtml() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("partials/assignment-list", array(
            "assignments" => $this->Assignment->getAllAssignments(),
            "tracks" => $this->tracks,
            "csrf" => $csrf,
        ));
    }

    /**
     * Displays the all the assignments that is searched
     * @return void Renders the searched assignment list
     */
    public function search() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("partials/assignment-list", array(
            "assignments" => $this->Assignment->searchAssignments($this->input->post()),
            "tracks" => $this->tracks,
            "csrf" => $csrf,
            "values" => $this->input->post()
        ));
    }
}