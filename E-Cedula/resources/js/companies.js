import axios from 'axios';
import './bootstrap';

async function populateCompaniesTable() {
    try {
        const response = await axios.get('/api/companies');
        const tableBody = document.querySelector('.table tbody');

        tableBody.innerHTML = '';

        response.data.forEach((company, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${company.ccc2024_no}</td>
                <td>${company.date_created}</td>
                <td>${company.company_name}</td>
                <td>${company.barangay}</td>
                <td>${company.municipality}</td>
                <td>${company.province}</td>
                <td>${company.kind_of_organization}</td>
                <td>${company.kind_nature_of_business}</td>
                <td>${company.place_of_registration}</td>
                <td>${company.date_of_registration}</td>
                <td>${company.region}</td>
                <td>${company.tin_no}</td>
                <td>${company.gross_receipt}</td>
                <td>${company.total_community_tax_due}</td>
                <td>${company.interest}</td>
                <td>${company.total_amount_paid}</td>
                <td>
                    <div class="d-flex">
                        <button type="button" data-id="${company._id}" class="btn btn-success me-2 btn-update">Update</button>
                        <button type="button" data-id="${company._id}" class="btn btn-danger btn-delete">Delete</button>
                    </div>
                </td>
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error("Error fetching companies:", error);
    }
}

document.addEventListener('click', function (event){
    if (event.target.classList.contains('btn-update')){
        const companyId = event.target.getAttribute('data-id')
        updateCompanyData(companyId);
    }
});

document.addEventListener('click', function (event){
    if (event.target.classList.contains('btn-delete')){
        const companyId = event.target.getAttribute('data-id')
        deleteCompanyData(companyId);
    }
});

window.onload = () => {
    populateCompaniesTable();

    const saveButton = document.getElementById('save');
    saveButton.addEventListener('click', saveChanges);
}

async function updateCompanyData(companyId){
    const companyToUpdate = await getCompanyById(companyId);
    console.log(companyToUpdate);

    document.getElementById('company_name').value = companyToUpdate.company_name;
    document.getElementById('barangay').value = companyToUpdate.barangay;
    document.getElementById('municipality').value = companyToUpdate.municipality;
    document.getElementById('province').value = companyToUpdate.province;
    document.getElementById('kind_of_organization').value = companyToUpdate.kind_of_organization;
    document.getElementById('nature_of_business').value = companyToUpdate.nature_of_business;
    document.getElementById('place_of_registration').value = companyToUpdate.place_of_registration;
    document.getElementById('date_of_registration').value = companyToUpdate.date_of_registration;
    document.getElementById('region').value = companyToUpdate.region;
    document.getElementById('tin').value = companyToUpdate.tin_no;
    document.getElementById('gross_receipt').value = companyToUpdate.gross_receipt;
    document.getElementById('total_community_tax_due').value = companyToUpdate.total_community_tax_due;
    document.getElementById('interest').value = companyToUpdate.interest;
    document.getElementById('total_amount_paid').value = companyToUpdate.total_amount_paid;

    // Open modal
    document.getElementById('updateModal').click();
    
    const saveButton = document.getElementById('save');
    saveButton.setAttribute('data-id', companyId)
}

function saveChanges(){
        const company_name = document.getElementById('company_name').value
        const barangay = document.getElementById('barangay').value
        const municipality = document.getElementById('municipality').value
        const province = document.getElementById('province').value
        const kind_of_organization = document.getElementById('kind_of_organization').value
        const nature_of_business = document.getElementById('nature_of_business').value
        const place_of_registration = document.getElementById('place_of_registration').value
        const date_of_registration = document.getElementById('date_of_registration').value
        const region = document.getElementById('region').value
        const tin = document.getElementById('tin').value 
        const gross_receipt = document.getElementById('gross_receipt').value
        const total_community_tax_due = document.getElementById('total_community_tax_due').value
        const interest = document.getElementById('interest').value
        const total_amount_paid = document.getElementById('total_amount_paid').value

    const data = {
         company_name: company_name,
         barangay: barangay,
         municipality: municipality,
         province: province,
         kind_of_organization: kind_of_organization,
         nature_of_business: nature_of_business,
         place_of_registration: place_of_registration,
         date_of_registration: date_of_registration,
         region: region,
         tin: tin, 
         gross_receipt: gross_receipt,
         total_community_tax_due: total_community_tax_due,
         interest: interest,
         total_amount_paid: total_amount_paid,
    };

    const companyId = document.getElementById('save').getAttribute('data-id');

    const url = `/api/companies/${companyId}`;
    axios.put(url, data)
    .then(response => {
        document.getElementById('closeModal').click();
        clearForm();
        populateCompaniesTable();
    })
    .catch(error => {
        console.error("Error updating product", error);
    });
}

function clearForm(){
    document.getElementById('company_name').value = '';
    document.getElementById('barangay').value = '';
    document.getElementById('municipality').value = '';
    document.getElementById('province').value = '';
    document.getElementById('kind_of_organization').value = '';
    document.getElementById('nature_of_business').value = '';
    document.getElementById('place_of_registration').value = '';
    document.getElementById('date_of_registration').value = '';
    document.getElementById('region').value = '';
    document.getElementById('tin').value = '';
    document.getElementById('gross_receipt').value = '';
    document.getElementById('total_community_tax_due').value = '';
    document.getElementById('interest').value = '';
    document.getElementById('total_amount_paid').value = '';
}

async function getCompanyById(companyId) {
    try {
        const response = await axios.get(`/api/companies/${companyId}`);
        return response.data;
    } catch (error) {
        console.error("Error fetching company:", error);
        return null;
    }
}

async function deleteCompanyData(companyId){
    try {
        await axios.delete(`/api/companies/${companyId}`);
        populateCompaniesTable();

        alert("Company cedula deleted successfully");
    } catch (error) {
        console.error("Error deleting product:", error)
    }
}