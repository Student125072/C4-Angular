(function() {
  angular.module('app2', []).controller('carController', function($scope) {
    var cars = [{
        merk: "Mercedes",
        kenteken: "87-XS-SA",
        kleur: "Zwart",
        aantaldeuren: 4,
        prijs: 25000,
      },
      {
        merk: "Tesla",
        kenteken: "87-SWH-1",
        kleur: "Zwart",
        aantaldeuren: 2,
        prijs: 30000,
      },
      {
        merk: "Toyota",
        kenteken: "28-SQW-1",
        kleur: "Zwart",
        aantaldeuren: 4,
        prijs: 30000,
      },
      {
        merk: "Opel",
        kenteken: "1-SJW-21",
        kleur: "Wit",
        aantaldeuren: 2,
        prijs: 15000,
      },
      {
        merk: "Range Rover",
        kenteken: "82-SJ-SK",
        kleur: "Zwart",
        aantaldeuren: 4,
        prijs: 40000,
      }
    ];


    $scope.cars = cars;
    $scope.sortColumn = 'merk';
    $scope.reverseSort = false;

    $scope.sortData = function(column){
      $scope.reverseSort = ($scope.sortColumn == column) ? !$scope.reverseSort : false;
      $scope.sortColumn = column;
    }



  });
})();
