<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: poppins, 'san-serif' !important;
            letter-spacing: 1px !important;
        }
    </style>
    <title>Document</title>
</head>

<body onload="loaddata()">
    <div class="loader-animate position-fixed d-none align-items-center justify-content-center h-100 w-100" style="background-color: rgba(194, 194, 194, 0.5);">
        <h1 class="">wait.....</h1>
    </div>
    <div class="container py-2">
        <div class="alert-message alert alert-warning alert-dismissible fade show d-none" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong class="alert-message-msg"></strong>
        </div>
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary  font-weight-bold " data-toggle="modal" data-target="#insertform">
                Add Record
            </button>
            <button id="deletemultiple" class="btn btn-danger mx-2">Delete</button>
        </div>
        <!-- Modal -->
        <div class="modal fade text-capitalize" id="insertform" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">insert record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="registerform" id="registerform">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="name ...">
                            </div>
                            <div class="form-group">
                                <input type="number" name="age" id="age" class="form-control" placeholder="age ...">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="phone ...">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" form="registerform" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- update info modal -->
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="editform" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="updateform" id="updateform">
                            <div class="form-group">
                                <input type="number" name="id" id="editid" class="form-control d-none" placeholder="name ...">
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" id="editname" class="form-control" placeholder="name ...">
                            </div>
                            <div class="form-group">
                                <input type="number" name="age" id="editage" class="form-control" placeholder="age ...">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" id="editphone" class="form-control" placeholder="phone ...">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="update" form="updateform">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- update info modal ends-->

        <!-- records table-->
        <div class="table-container py-3">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>action</th>
                            <th>
                                <input type="checkbox" name="checkall" id="checkall">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="loaddata">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="js/crud.js"></script>
</body>

</html>