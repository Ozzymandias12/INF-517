window.addEventListener("load", function(event) {
    var gradeSelect = document.getElementById("grade");
    for (var i = 0; i <= 100; i++) {
      var option = document.createElement('option');
      option.text = i;
      gradeSelect.appendChild(option);
    }
  });
