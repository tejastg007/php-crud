<?php
$conn = mysqli_connect("localhost", "root", "", "ajax");
class crud
{
    function insertdata($data)
    {
        $conn = $GLOBALS['conn'];
        $name = $data['name'];
        $phone = $data['phone'];
        $age = $data['age'];
        $stmt = $conn->prepare("INSERT INTO crud (name,phone,age) VALUES(?,?,?)");
        $stmt->bind_param("ssi", $name, $phone, $age);
        if ($stmt->execute())
            echo "data inserted successfully";
        else
            echo "something went wrong, please try again";
    }

    function updatedata($data)
    {
        $conn = $GLOBALS['conn'];
        $id = $data['id'];
        $name = $data['name'];
        $phone = $data['phone'];
        $age = $data['age'];
        $stmt = $conn->prepare("UPDATE crud set name=?,phone=?,age=? where id=?");
        $stmt->bind_param("ssis", $name, $phone, $age, $id);
        if ($stmt->execute())
            echo "data updated successfully!";
        else
            echo "something went wrong !";
    }

    function loaddata()
    {
        $conn = $GLOBALS['conn'];
        $echo = "";
        $i = 0;
        $result = mysqli_query($conn, "SELECT * FROM crud order by id desc");
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            $echo .= "<tr>
            <td class='d-none'>" . $row['id'] . "</td>
            <td>" . $i . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>
                <button class='btn btn-sm btn-primary' data-toggle='modal' data-target='#editform' >edit</button>
            </td>
            <td>
                <input type='checkbox' name='check[]' class='checkbox' value='" . $row['id'] . "'>
            </td>
        </tr>";
        }
        echo $echo;
    }

    function delete($data)
    {
        $conn = $GLOBALS['conn'];
        foreach ($data as $record) {
            mysqli_query($conn, "DELETE from crud where id='$record'");
        }
        echo "data deleted successfully!";
    }
}

$crud = new crud();
if ($_SERVER['REQUEST_METHOD'] == "POST")
    switch ($_POST['action']) {
        case "insert":
            $crud->insertdata($_POST['data']);
            break;
        case "update":
            $crud->updatedata($_POST['data']);
            break;
        case "load":
            $crud->loaddata();
            break;
        case "deletemultiple":
            $crud->delete($_POST['data']);
        default:
    }
