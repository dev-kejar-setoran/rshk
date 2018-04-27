<div class="ui fluid accordion" style="padding-top: 4rem;"">
    <?php 
    $this->db->select('a.*');
    $this->db->join('m_role_user b', 'b.id_role_menu = a.id_role_menu', 'inner');    
    $this->db->where('b.role',$this->session->userdata('role'));
    $this->db->where('level',1);
    $this->db->where('status',1);
    $this->db->order_by('urutan','ASC');
    $menulevel_1 = $this->db->get('m_role_menu a');
    //$menulevel_1 = $this->db->order_by('urutan','ASC')->get_where('m_role_menu', array('level' => 1, 'status' => 1)); 
    // MENU LEVEL 1
    foreach ($menulevel_1->result() as $main) {
        // get data
        $this->db->select('a.*');
        $this->db->join('m_role_user b', 'b.id_role_menu = a.id_role_menu', 'inner');    
        $this->db->where('b.role',$this->session->userdata('role'));
        $this->db->where('level',2);
        $this->db->where('status',1);
        $this->db->where('id_parent',$main->id_role_menu);
        $this->db->order_by('urutan','ASC');
        $menulevel_2 = $this->db->get('m_role_menu a');
        // $this->db->order_by('urutan','ASC');
        // $menulevel_2 = $this->db->order_by('urutan','ASC')->get_where('m_role_menu', array('id_parent' => $main->id_role_menu, 'level' => 2, 'status' => 1 ));
        if ($menulevel_2->num_rows() > 0) {
            echo '
                <div class="ui title ">
                    <i class="dropdown icon"></i>
                    <i class=" '.$main->icon.' icon"></i>
                    '.$main->nama_role_menu.'
                </div>
            ';
            echo '<div class="ui content ">';
            // MENU LEVEL 2
            foreach ($menulevel_2->result() as $sub) {
                echo '
                    <a href="'. base_url($sub->url) .'" class=" item">
                        <i class=" '. $sub->icon .' icon"></i> '. $sub->nama_role_menu .'
                    </a>
                ';
            }
            echo "</div>"; // tutup div ui content
        }
        else{
            echo '
                <a href="'.base_url($main->url).'" class="item">
                    <i class="icon" style="margin-right: 0"></i><i class="'.$main->icon.' icon"></i> '.$main->nama_role_menu.'
                </a>
            ';
        }
    } // emd foreach
    ?>
</div>