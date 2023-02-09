const ctx = document.querySelector('#activity-chart').getContext('2d');

const data = {
  labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
  datasets: [{
    data: [0, 0, 0, 0, 0, 0, 0],
    label: 'Dia da semana',
    backgroundColor: 'transparent',
    borderColor: '#000',
    tension: .3
  }]
}

const options = {
  plugins: {
    legend: false,
  },
  scales: {
    x: {
      grid: {
        display: false,
        color: '#f5f5f5'
      },
      ticks: {
      
      }
    },
    y: {
      min: 0,
      max: 100,
      ticks: {
        stepSize: 25,
        callback: (value) => value,
        color: '#000' //#E3CDC1
      },
      grid: {
        color: '#498DC9',
        borderDash: [10]
      }
    }
  }
}

const config = {
  type: 'line',
  data,
  options
}

function getUserWeekArticles() {
  const url = 'http://localhost:8000/api/v1/users/1/articles/week';

  return new Promise((resolve, reject) => {
    const ajax = new XMLHttpRequest();

    ajax.onreadystatechange = () => {
      if (ajax.readyState == 4) {
        resolve(ajax.response);
      }
    }
    ajax.open('GET', url);
    ajax.send();
  });
}

getUserWeekArticles()
  .then((value) => {
    const response = JSON.parse(value);

    if (response.data) {
      response.data.forEach(element => {
        const weekDay = new Date(element.created_at).getDay() - 1;
  
        data.datasets[0].data[weekDay] += 1; 
      });
    };

    myChart = new Chart(ctx, config);
  });