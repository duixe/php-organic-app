(function() {
  "use strict";

  ORGANICSTORE.admin.dashboard = function() {
    charts();

    setInterval(charts, 5000);
  }

  function charts() {
    let order = document.getElementById('order');
    let revenue = document.getElementById('revenue');

    //create labels
    let orderLabels = [];
    let orderData = [];
    let revenueLabels = [];
    let revenueData = [];

    axios.get('/admin/charts')
    .then(function(res) {
      res.data.orders.forEach(function(monthly) {
        orderData.push(monthly.count);
        orderLabels.push(monthly.new_date);
      });
      res.data.revenues.forEach(function(monthly) {
        revenueData.push(monthly.amount);
        revenueLabels.push(monthly.new_date);
      });

      new Chart(revenue, {
        type: 'bar',
        data: {
          labels: revenueLabels,
          datasets: [{
              label: "# Revenues",
              data: revenueData,
              backgroundColor: [
                '#0d47a1',
                "#FF6384",
                "#4BC0C0",
                "#FFCE56",
                "#1b5e20",
                "#36A2EB",
                '#311b92',
                '#dd2c00',
                '#263238',
                '#81c784',
                '#b9f6ca',
                '#f57c00'
              ]

            }]
        }
      });

      new Chart(order, {
        type: 'line',
        data: {
          labels: orderLabels,
          datasets: [
            {
              label: "# Orders",
              lineTension: 0.3,
              backgroundColor: "rgba(78, 115, 223, 0.05)",
              borderColor: "rgba(78, 115, 223, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data: orderData
            }
          ]
        }
      });


    });
  }
})();
