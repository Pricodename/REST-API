<?php
class Categories{
 
    // database connection and table name
    private $conn;
    private $table_name = "categories";
 
    // object properties
    public $id;
    public $name;
    public $description;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	// read products
function read(){
 
    // select all query
    $query = "SELECT
                c.id,c.name as Category_name,c.description,c.created,p.price FROM
                " . $this->table_name . " c
                LEFT JOIN
                    product p ON c.id=p.category_id
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
// create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                id=:id,name=:name,description=:description,created=:created";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":created", $this->created);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
// used when filling up the update product form
function read_single(){
 
    // query to read single record
    $query = "SELECT
                c.id,c.name as Category_name,c.description,c.created,p.price FROM
                " . $this->table_name . " c
                LEFT JOIN
                    product p ON c.id=p.category_id
            ORDER BY
                p.created DESC
            WHERE
                p.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->id = $row['id'];
    $this->name = $row['name'];
    $this->description = $row['description'];
}
// update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                id = :id,
                name = :name,
                description = :description,
               
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->description=htmlspecialchars(strip_tags($this->description));
   
    
 
    // bind new values
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
