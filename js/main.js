$(document).ready(function () {
  $(".table tr").hover(
    function () {
      $(this).addClass("hover");
    },
    function () {
      $(this).removeClass("hover");
    }
  );

  $(".table tr").click(function () {
    $(".table tr").removeClass("active");
    $(this).addClass("active");
  });
});

$("#edit-btn").attr("disabled", true);
$("#status1").attr("disabled", true);
$("textarea").attr("disabled", true);

function editTask(e) {
  $("#edit-btn").attr("disabled", false);
  $("#status1").attr("disabled", false);
  $("textarea").attr("disabled", false);
  $("#title_id").text(e.children[0].innerHTML);
  $("#email").val(e.children[2].innerHTML);
  $("#id").val(e.children[0].innerHTML);
  $("#username").val(e.children[1].innerHTML);
  $("#text-task").val(e.children[3].innerHTML);
  if (e.children[4].innerHTML == 1) {
    $("#status1").attr("checked", true);
  } else {
    $("#status1").attr("checked", false);
  }
}

$("#log_in").click(function () {
  console.log("test");
  $(".modal").css("display", "block");
});

$(document).mouseup(function (e) {
  var div = $(".modal");
  if (!div.is(e.target) && div.has(e.target).length === 0) {
    div.hide();
  }
});
