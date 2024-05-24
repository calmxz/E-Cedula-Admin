import axios from 'axios';
import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function () {
    function fetchDataAndUpdate() {
        axios.get('/dashboard-data')
            .then(response => {
                const data = response.data;

                // Format numbers to 2 decimal places
                const collectionsTodayFormatted = `Php ${data.collectionsToday.toFixed(2)}`;
                const collectionsThisMonthFormatted = `Php ${data.collectionsThisMonth.toFixed(2)}`;

                document.getElementById('collectionsToday').textContent = collectionsTodayFormatted;
                document.getElementById('transactionsToday').textContent = data.transactionsToday;
                document.getElementById('collectionsThisMonth').textContent = collectionsThisMonthFormatted;
                document.getElementById('transactionsThisMonth').textContent = data.transactionsThisMonth;

                // Update charts with the fetched data
                updateCharts(data);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    function updateCharts(data) {
        const weeklyEarningsCtx = document.getElementById('weeklyEarningsChart').getContext('2d');
        const dailyEarningsCtx = document.getElementById('dailyEarningsChart').getContext('2d');

        new Chart(weeklyEarningsCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Weekly Earnings',
                    data: data.weeklyEarnings,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });

        new Chart(dailyEarningsCtx, {
            type: 'line',
            data: {
                labels: ['6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'Yesterday', 'Today'],
                datasets: [{
                    label: 'Daily Earnings',
                    data: data.dailyEarnings,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });
    }

    // Initial fetch
    fetchDataAndUpdate();
});
