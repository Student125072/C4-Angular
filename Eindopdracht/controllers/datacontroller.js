var app = angular.module('app', ['ngRoute']);

app.config(function($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: 'views/index.htm'
    })
    .when("/add_del", {
      templateUrl: 'views/add_del.htm'
    })
    .when("/update", {
      templateUrl: 'views/update.htm'
    });
});

app.config(['$qProvider', function($qProvider) {
  $qProvider.errorOnUnhandledRejections(false);
}]);

app.controller('datactrl', function($scope, $http) {

  $http.get("model/php/datagetter.php")
    .then(function(response) {
      $scope.personen = response.data.records;
    });

    $scope.formData = {
      "id" : "",
      "voornaam" : "",
      "achternaam" : "",
      "straat" : "",
      "huisnummer" : "",
      "postcode" : "",
      "woonplaats" : "",
      "telefoonnummer" : "",
      "toevoegen" : false,
      "update" : false,
      "verwijderen" : false
    };

  $scope.processForm = function(){

    $http.post('model/php/crud.php', $scope.formData)
    .then(function(data){
      console.log(data);
    });
  }

});
