$(function () {
  //!load data in table
  loaddata = function () {
    show_loader();
    $.ajax({
      url: "php/crud.php",
      type: "post",
      data: {
        action: "load",
      },
      success: function (data, status) {
        $(".loaddata").html(data);
        hide_loader();
      },
    });
  };
  //!load data in table ends

  //! insert/update data function
  $("form").on("submit", function (event) {
    event.preventDefault();
    var form = $(this).attr("id");
    if (form == "registerform") {
      var action = "insert";
    } else if (form == "updateform") {
      var action = "update";
    }
    $(".modal").modal("hide");
    var serializedata = $("#" + form).serializeArray();
    $("#" + form).trigger("reset");
    var data = {};
    serializedata.forEach((value) => {
      data[value["name"]] = $.trim(value["value"]);
    });
    $.ajax({
      url: "php/crud.php",
      type: "post",
      data: {
        action: action,
        data: data,
      },
      success: function (data, status) {
        loaddata();
        alert_message(data);
      },
    });
  });
  //! insert data function ends
  //! delete multiple records on button click
  $("#deletemultiple").click(function () {
    if ($(".checkbox:checked").length == 0) {
      alert("no record selected");
    } else {
      if (confirm("confirm to delete the record/s") == false) return false;
      var checklist = [];
      $(".checkbox").each(function () {
        if ($(this).is(":checked")) {
          checklist.push($(this).val());
        }
      });
      $.ajax({
        url: "php/crud.php",
        type: "post",
        data: {
          action: "deletemultiple",
          data: checklist,
        },
        success: function (data, status) {
          loaddata();
          alert_message(data);
        },
      });
    }
  });
  //! delete multiple records on bytton click end

  // !load current data in modal for edit
  $("table").on("click", function (event) {
    var tr = event.target.parentNode.parentNode;
    $("#editid").val(tr.cells[0].textContent);
    $("#editname").val(tr.cells[2].textContent);
    $("#editphone").val(tr.cells[3].textContent);
    $("#editage").val(tr.cells[4].textContent);
    // !load current data in modal for edit ends
  });
  //!  bootstrap alert-message function
  alert_message = function (data) {
    $(".alert-message").toggleClass("d-none");
    $(".alert-message-msg").text(data);
    setTimeout(function () {
      $(".alert-message").toggleClass("d-none");
    }, 3000);
    //!  alert function end
  };
  //! animate loader
  show_loader = function () {
    $(".loader-animate").removeClass("d-none");
    $(".loader-animate").toggleClass("d-flex");
  };
  hide_loader = function () {
    $(".loader-animate").removeClass("d-flex");
    $(".loader-animate").toggleClass("d-none");
    //! animate loader ends
  };
  //! select all checkbox on parent checkbox
  $("#checkall").on("click", function () {
    $(".checkbox").prop("checked", this.checked);
    //! select all checkbox on parent checkbox end
  });
});
