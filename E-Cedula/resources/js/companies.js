import './bootstrap';

async function populateCompaniesTable(){
    try{
        const response = await axios.get('/api/companies');
        const tableBody = document.querySelector('.table tbody');

        tableBody.innerHTML = '';

        response.data.forEach((companies, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>${index + 1}</td>
            <td>${companies.ccc2024_no}</td>
            <td>${companies.date_created}</td>
            <td>${companies.company_name}</td>
            <td>${companies.barangay}</td>
            <td>${companies.municipality}</td>
            <td>${companies.province}</td>
            <td>${companies.kind_of_organization}</td>
            <td>${companies.kind_nature_of_business}</td>
            <td>${companies.place_of_registration}</td>
            <td>${companies.date_of_registration}</td>
            <td>${companies.region}</td>
            <td>${companies.tin_no}</td>
            <td>${companies.gross_receipt}</td>
            <td>${companies.total_community_tax_due}</td>
            <td>${companies.interest}</td>
            <td>${companies.total_amount_paid}</td>
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error("Error fetching individuals:", error);
    }
}

window.onload = () => {
    populateCompaniesTable();
}