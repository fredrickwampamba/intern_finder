var canvas = document.getElementById('myCanvas');
var context = canvas.getContext('2d');

var messageBanner = document.getElementById('messageBanner');
var functionTextBox = document.getElementById('functionTextBox');

var myEq = new Equation();
var myGrid = new Grid(canvas, myEq);

document.getElementById("form").onsubmit = function(e){
  e.preventDefault();
  clicked();
  return false;
};

//draw lines when page loads
myGrid.DrawGridLines();

function clicked() {

  myEq.setEquation(functionTextBox.value);

  //clear the canvas
  context.clearRect(0, 0, canvas.width, canvas.height);

  //re-draw grid lines.
  myGrid.DrawGridLines();

  if (!myEq.validateEq()) {
    messageBanner.innerText =
      "The equasion must contain only real numbers" + " and the variable x. You can use multiplication, division," + " addition, and subtraction."; + " Ex: 5x + 100 * 1.5x"
    return;
  }

  myGrid.GraphEquation();
  messageBanner.innerText = "Success!";

}