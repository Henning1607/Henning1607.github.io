        var locations = [
          ['SATS Spektrum',59.914849,10.755932,1],['SATS Bislett', 59.924474427415,10.7322905885314,1],
          ['SATS Kampen',59.910591,10.78816],['SATS Aker Brygge',59.914935,10.722946],
          ['SATS Vulkan',59.928012,10.751442],['SATS Ila',59.932312,10.751785],
          ['SATS Sagene',59.940568,10.752472],['SATS Grünerløkka',59.922334,10.760711],
          ['SATS Frogner',59.916311,10.71954],['SATS National',59.914757,10.731156],
          ['SATS Hellerud',59.916372,10.848288]];
      
          var elix = [
          ['ELIXIA Colosseum',59.931968,10.712303],['ELIXIA Sjølyst',59.91971,10.685914],
          ['ELIXIA Carl Berner',59.928829,10.778268],['ELIXIA Rignes Prak',59.928506,10.759557],
          ['ELIXIA Lambertseter',59.878784,10.808398],['ELIXIA Nordic',59.920527,10.683447],
          ['ELIXIA Ullevål Stadion',59.949891,10.735739], ['ELIXIA Linderurd',59.943255,10.835758],
          ['ELIXIA Årvoll',59.945964,10.810773],['ELIXIA Kalbakken',59.952881,10.867692]];
          
          var fresh = [
          ['Fresh Fitness Ensjø',59.914535,10.788096], ['Fresh Fitness Majorstua',59.924894,10.725096],
          ['Fresh Fitness Ryen',59.89373,10.806673],['Fresh Fitness Ullevål',59.935645,10.732008] ];
          var fitness = [
          ['Fitness Express Hasle',59.923518,10.792691], ['Fitness Express Storo',59.943691,10.771048], 
          ['Fitness Express Majorstua',59.927092,10.728287]];
          var atletica = [
          ['Centrum Atletica',59.917446,10.744456],['Nydalen Atletica',59.948875,10.768149],
          ['Domus Atletica',59.94606,10.724319]];
          var rest = [
          ['Actic Furuset', 59.94049,10.899322], ['Bare trening', 59.929201,10.778293],
          ['Myrens Sportsenter', 59.934823,10.759359], ['CONDIS Økern',59.929903,10.80677],
          ['EVO Majorstua',59.93071,10.712139], ['EVO Nydalen', 59.949532,10.767089],
          ['EVO Grünerløkka',59.919839,10.75954],['EVO Vika',59.91291,10.72878],
          ['EVO Nordstand',59.861438,10.799806], ['Partner Gym',59.910235,10.767636],
          ['HARALDS Gym',59.915705,10.758648], ['FRISKIS & SVETTIS Majorstua',59.930764,10.71043],
          ['FRISKIS & SVETTIS Møllerparken',59.929544,10.75591]
          
    
          
      ];
     
            var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: new google.maps.LatLng(59.914354,10.752132)
                  
        });
        

        var infowindow = new google.maps.InfoWindow();

          for (i = 0; i < locations.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            icon: 'bilder/orange_MarkerS.png'
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
          };
           var infowindow2 = new google.maps.InfoWindow();

          for (i = 0; i < elix.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(elix[i][1], elix[i][2]),
            map: map,
            icon: 'bilder/darkgreen_MarkerE.png'
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(elix[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
          };
          
            var infowindow3 = new google.maps.InfoWindow();

          for (i = 0; i < fresh.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(fresh[i][1], fresh[i][2]),
            map: map,
            icon: 'bilder/red_MarkerF.png'
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(fresh[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
          };
          
                     var infowindow4 = new google.maps.InfoWindow();

          for (i = 0; i < fitness.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(fitness[i][1], fitness[i][2]),
            map: map,
            icon: 'bilder/pink_MarkerF.png'
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(fitness[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
          };
          
                     var infowindow5 = new google.maps.InfoWindow();

          for (i = 0; i < atletica.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(atletica[i][1], atletica[i][2]),
            map: map,
            icon: 'bilder/yellow_MarkerA.png'
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(atletica[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
          };
          
                     var infowindow6 = new google.maps.InfoWindow();

          for (i = 0; i < rest.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(rest[i][1], rest[i][2]),
            map: map,
            icon: 'bilder/paleblue_MarkerA.png'
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(rest[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
          };