function Equation() {

  var equation;

  this.setEquation = function(value) {
    equation = value;
  };
  
  this.getEquation = function() {
    return equation;
  };

  this.yGivenX = function(x) {
    "strict mode";
    var eqx = equation;
    if (!this.validateEq()) return;

    //expand coeffecients : 2x -> 2*x
    eqx = eqx.replace(/([0-9])[xX]/g, "$1*x");

    //fill in the value of x
    eqx = eqx.replace(/[xX]/g, x);
    return eval(eqx);
  };

  this.validateEq = function() {
    var allowedChars = "xX1234567890%^*()-+/. ";
    for (var i = 0; i < equation.length; i++)
      if (allowedChars.indexOf(equation.charAt(i)) < 0)
        return false;
    return true;
  };

} // end of Equation