function Grid(canvas, equation, interval) {

  var context = canvas.getContext('2d');

  var gridTicksInterval;

  if (!interval) gridTicksInterval = 50;

  this.DrawGridLines = function() {
    context.strokeStyle = 'black';

    //x line
    context.beginPath();
    context.moveTo(0, findAbsoluteY(0));
    context.lineTo(canvas.width, findAbsoluteY(0));
    context.stroke();

    //y line
    context.beginPath();
    context.moveTo(findAbsoluteX(0), 0);
    context.lineTo(findAbsoluteX(0), canvas.height);
    context.stroke();

    context.textAlign = "center";
    //y labels
    var offset = (canvas.height % gridTicksInterval) / 2;

    for (var i = offset; i <= canvas.height; i += gridTicksInterval) {

      var width = context.measureText(i).width;
      context.fillStyle = 'white';
      context.fillRect(findAbsoluteX(-width / 2), i - 10, width, 10);
      context.fillStyle = 'black';

      context.strokeStyle = 'black';
      context.fillText(findRelativeY(i), findAbsoluteX(0), i);
    }

    //x labels
    var xOffset = (canvas.width % gridTicksInterval) / 2;

    for (var j = xOffset; j <= canvas.width; j += gridTicksInterval) {

      //a center 0 label was already added by the y labels code.
      if (findRelativeX(j) === 0) continue;

      context.strokeStyle = 'black';
      context.textAlign = "center";

      context.fillText(findRelativeX(j), j, findAbsoluteY(5));
    }

  };
  
  this.setGridTicksInterval = function(interval) {
    gridTicksInterval = interval;
  };

  this.GraphEquation = function() {

      var xMin = -(canvas.width / 2);
      var xMax = -xMin;

      var yMin = equation.yGivenX(xMin);
      var yMax = equation.yGivenX(xMax);

      context.beginPath();
      context.moveTo(findAbsoluteX(xMin), findAbsoluteY(yMin));
      context.lineTo(findAbsoluteX(xMax), findAbsoluteY(yMax));

      context.strokeStyle = 'red';

      context.stroke();
  };

  function findAbsoluteX(x) {
    return x + (canvas.width / 2);
  }

  function findAbsoluteY(y) {
    return -y + (canvas.height / 2);
  }

  function findRelativeX(x) {
    return x - (canvas.width / 2);
  }

  function findRelativeY(y) {
    return -y + (canvas.height / 2);
  }
}