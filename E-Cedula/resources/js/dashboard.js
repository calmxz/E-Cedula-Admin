import axios from 'axios';
import { Chart, registerables } from 'chart.js';

Chart.register(...registerables);

document.addEventListener('DOMContentLoaded', function () {
    axios.get('/api/dashboard-data')
        .then(response => {
            const data = response.data;
            document.getElementById('collectionsToday').textContent = `Php ${data.totalCollectionsToday.toFixed(2)}`;
            document.getElementById('transactionsToday').textContent = data.transactionsToday;
            document.getElementById('collectionsThisMonth').textContent = `Php ${data.totalCollectionsThisMonth.toFixed(2)}`;
            document.getElementById('transactionsThisMonth').textContent = data.transactionsThisMonth;

            // Sample data for charts
            const weeklyEarningsData = [0, 0, 0, 0, 0, 0, 0]; // Replace with actual data
            const totalEarningsData = [0, 2000, 5000, 7500, 10000, 15000, 18590]; // Replace with actual data

            // Weekly Earnings Chart
            new Chart(document.getElementById('weeklyEarningsChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Total Earnings',
                        data: weeklyEarningsData,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Total Earnings Chart
            new Chart(document.getElementById('totalEarningsChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['2023-06', '2023-07', '2023-08', '2023-09', '2023-10', '2023-11', '2023-12'],
                    datasets: [{
                        label: 'Total Earnings',
                        data: totalEarningsData,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('There was an error fetching the data!', error);
        });
});