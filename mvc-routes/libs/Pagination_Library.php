<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/11/2016
 * Time: 2:35 PM
 */
class Pagination_Library
{

    private $conn;
    private $query;
    private $limit;
    private $page;
    private $total;
    public function load($conn, $query)
    {
        $this->conn = $conn;
        $this->query = $query;
        $stmt = $this->conn->prepare($this->query);
        $stmt->execute();
        $this->total = $stmt->rowCount();
    }
    public function getData($limit = 12, $page = 1)
    {
        $this->limit = $limit;
        $this->page = $page;
        if ($this->limit == "all") {
            $query = $this->query;
        } else {
//            $query = $this->query . " LIMIT " . (($this->page - 1) * $this->limit) . ",$this->limit";
            $query = $this->query . " LIMIT " . (($this->page - 1) * $this->limit) . ", $this->limit";
        }
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = new stdClass();
        $result->page = $this->page;
        $result->limit = $this->limit;
        $result->total = $this->total;
        $result->data = $row;
        return $result;
    }
    
    public function createLinks($link, $list_class)
    {
        if ($this->limit == 'all') {
            return "";
        }
        $last = ceil($this->total / $this->limit); // lay trang cuoi cung cua phan trang
        $start = ($this->page - $link > 0) ? $this->page - $link : 1; // trang dau de hien thi
        $end = (($this->page + $link) < $last) ? $this->page + $link : $last; // trang cuoi de hien thi
        $html = "<ul class ='" . $list_class . "'>";
        $class = ($this->page == 1) ? "disabled" : "";
        $html .= '<li class="'.$class.'"><a href="?page=' . ($this->page - 1) . '">&laquo;</a> </li>';
        if ($start > 1) { // Them vao dau .. vao truoc
            $html .= "<li><a href='?page=1'>1</a> </li>";
            $html .= "<li class='disabled'><span>...</span></li>";
        }
        for ($i = $start; $i <= $end; $i++) {
            $class = ($this->page == $i) ? "active" : ""; // Neu class hien tai thi active len thoi
            $html .= '<li class="' . $class . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($end < $last) { // them vao dau ... vao sau
            $html .= '<li class="disabled"><span>...</span></li>';
            $html .= '<li><a href="?page=' . $last . '">' . $last . '</a></li>';
        }
        $class = ($this->page == $last) ? "disabled" : "";
        $html .= '<li class="' . $class . '"><a href="?page=' . ($this->page + 1) . '">&raquo;</a></li>';
        $html .= '</ul>';
        return $html;
    }
}