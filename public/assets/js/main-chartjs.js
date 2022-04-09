// --------------
// CONFIG CHART
// --------------

// CHART USER BARU
const labelsUserBaru = [1, 2, 3, 4, 5, 6, 7];
const dataUserBaru = {
    labels: labelsUserBaru,
    datasets: [
        {
            label: "User Baru",
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: ["rgb(18,105,219, 0.2)"],
            borderColor: ["rgb(18,105,219)"],
            borderWidth: 1,
        },
    ],
};

const configUserBaru = {
    type: "bar",
    data: dataUserBaru,
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
};

const ChartUserBaru = new Chart(
    document.getElementById("ChartUserBaru"),
    configUserBaru
);

// CHART Pembelian By Omset Perbulan
const labelsPembelianByOmsetPerbulan = [1, 2, 3, 4, 5, 6];
const dataPembelianByOmsetPerbulan = {
    labels: labelsPembelianByOmsetPerbulan,
    datasets: [
        {
            label: "Pembelian By Omset Perbulan",
            backgroundColor: "rgb(18,105,219)",
            borderColor: "rgb(18,105,219)",
            data: [0, 1, 2, 10, 10, 20],
        },
    ],
};

const configPembelianByOmsetPerbulan = {
    type: "line",
    data: dataPembelianByOmsetPerbulan,
    options: {},
};

const ChartPembelianByOmsetPerbulan = new Chart(
    document.getElementById("ChartPembelianByOmsetPerbulan"),
    configPembelianByOmsetPerbulan
);

// CHART Upload Visibility
const labelsUploadVisibility = [1, 2, 3, 4, 5, 6];
const dataUploadVisibility = {
    labels: labelsUploadVisibility,
    datasets: [
        {
            label: "Upload Visibility",
            backgroundColor: "rgb(18,105,219)",
            borderColor: "rgb(18,105,219)",
            data: [0, 1, 2, 10, 10, 20],
        },
    ],
};

const configUploadVisibility = {
    type: "line",
    data: dataUploadVisibility,
    options: {},
};

const ChartUploadVisibility = new Chart(
    document.getElementById("ChartUploadVisibility"),
    configUploadVisibility
);

// CHART Total Penukaran Point
const labelsTotalPenukaranPoint = [1, 2, 3, 4, 5, 6, 7];
const dataTotalPenukaranPoint = {
    labels: labelsTotalPenukaranPoint,
    datasets: [
        {
            label: "Total Penukaran Point",
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: ["rgb(18,105,219, 0.2)"],
            borderColor: ["rgb(18,105,219)"],
            borderWidth: 1,
        },
    ],
};

const configTotalPenukaranPoint = {
    type: "bar",
    data: dataTotalPenukaranPoint,
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
};

const ChartTotalPenukaranPoint = new Chart(
    document.getElementById("ChartTotalPenukaranPoint"),
    configTotalPenukaranPoint
);
