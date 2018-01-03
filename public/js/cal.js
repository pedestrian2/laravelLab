var parser = new Parser();
var caculate = function(){
    console.log(parser.parse(this.value));
};

document.addEventListener('DOMContentLoaded', function(element){
    document.querySelector('#formula').addEventListener('change', caculate, element);
});










