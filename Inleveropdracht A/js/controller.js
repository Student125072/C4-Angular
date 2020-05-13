(function() {
  angular.module('app1', []).controller('controller1', function($scope) {
    $scope.voornaam = '';
    $scope.achternaam = '';
    $scope.adres = '';
    $scope.huisnummer = '';
    $scope.postcode = '';
    $scope.woonplaats = '';
    $scope.emailadres = '';

    $scope.updateValues = function(form) {
      if (form.$valid) {
        $scope.personalinfo = {
          voornaam: $scope.voornaam,
          achternaam: $scope.achternaam,
          adres: $scope.adres,
          huisnummer: $scope.huisnummer,
          postcode: $scope.postcode,
          woonplaats: $scope.woonplaats,
          emailadres: $scope.emailadres
        };
      }
    };

  });
})();
