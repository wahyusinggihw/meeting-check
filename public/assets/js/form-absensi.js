/**
 * Sets an input filter on a textbox to only allow numeric input and displays an error message if non-numeric characters are entered.
 * @param {HTMLInputElement} textbox - The input element to set the filter on.
 * @param {string} errMsg - The error message to display if non-numeric characters are entered.
 */
function setInputFilter(textbox, errMsg) {
  textbox.addEventListener("input", function () {
    const numericValue = this.value.replace(/[^0-9]/g, ""); // Remove non-numeric characters

    if (this.value !== numericValue) {
      // Non-numeric characters were entered - block and show error
      this.value = numericValue;
      this.classList.add("input-error");
      this.setCustomValidity(errMsg);
      this.reportValidity();
    } else {
      // Numeric input - remove error
      this.classList.remove("input-error");
      this.setCustomValidity("");
      this.reportValidity();
    }
  });
}

// $(document).ready(function () {
setInputFilter(document.getElementById("nip"), "Harus berupa angka");
// label nik

// INITIAL
$("#label-default").show();
$("#cariNikButton").hide();
$(
  "#nip, #no_hp, #nama, #alamat, #asal_instansi_option, #asal_instansi_tamu, #signatureCanvas"
).addClass("greyed-out-form");

// handle on validation
if ($('input[name="statusRadio"]:checked').val() === "tamu") {
  $(
    "#nip, #no_hp, #nama, #alamat, #asal_instansi_option, #asal_instansi_tamu"
  ).removeClass("greyed-out-form");
  $("#signatureCanvas").removeClass("greyed-out-form");
}

if ($('input[name="statusRadio"]:checked').val() === "pegawai") {
  $("#nip").addClass("greyed-out-form");
  $("#cariNikButton").show();
  $(
    "#no_hp, #nama, #alamat, #asal_instansi_option, #asal_instansi_tamu"
  ).addClass("greyed-out-form");
  $("#cariNikButton").addClass("disabled-button");
  $("#signatureCanvas").removeClass("greyed-out-form");
}
// end handle on validation

// Handle tamu
$(".statusRadio").on("click", function () {
  var statusValue = $('input[name="statusRadio"]:checked').val();

  if (statusValue === "tamu") {
    $("#label-default").hide();
    $("#label-nik").show();
    // hide cari
    $("#nip").attr("maxlength", "16");
    $("#cariNikButton").hide();
    var timeoutId; // Store a timeout ID for delayed NIP input

    $("#nip").on("input", function () {
      var nikValue = $(this).val();
      clearTimeout(timeoutId); // Clear previous timeout

      if (nikValue.length === 0) {
        // Handle empty NIP input (clear other fields and hide loading)
        $("#no_hp, #nama, #alamat, #asal_instansi_tamu")
          .val("")
          .prop("readonly", false);
        $("#loadingIndicator").hide();
      } else {
        // Show loading indicator while user is still typing
        $("#loadingIndicator").show();

        // Set a timeout before making the AJAX request
        timeoutId = setTimeout(function () {
          $.ajax({
            url: "/api/peserta/" + nikValue, // Replace with your API endpoint
            type: "GET",
            success: function (data) {
              console.log(data);
              console.log(data.status);
              if (data.status === false) {
                $("#loadingIndicator").hide();
                $("#no_hp, #nama, #alamat, #asal_instansi_tamu")
                  .val("")
                  .prop("readonly", false);
              } else {
                Swal.fire({
                  icon: "success",
                  title: "Success!",
                  toast: "true",
                  position: "top-end",
                  text: "Silahkan melakukan tanda tangan.",
                  showConfirmButton: false, // Optionally, hide the "OK" button
                  timer: 4000, // Auto-close the toast after 2 seconds (adjust the duration as needed)
                });
                console.log(data);
                $("#loadingIndicator").hide();
                $("#signatureCanvas").removeClass("greyed-out-form");
                // $('#no_hp, #nama, #alamat, #asal_instansi_tamu').addClass('greyed-out-form');
                // Update the form fields with the fetched data
                $("#no_hp").val(data.data.no_hp).prop("readonly", false);
                $("#nama").val(data.data.nama).prop("readonly", false);
                $("#alamat").val(data.data.alamat).prop("readonly", false);
                $("#instansiText, #asal_instansi_tamu")
                  .val(data.data.asal_instansi)
                  .prop("readonly", false);
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              // Handle errors if the AJAX request fails
              console.log("AJAX Error: " + textStatus);
            },
          });
        }, 1000); // Adjust the delay (in milliseconds) as needed
      }
    });
  }

  if (statusValue === "pegawai") {
    $("#label-default").show();
    $("#label-nik").hide();
    $("#cariNikButton").show();
    $("#loadingIndicator").hide();
    $("#nip").off("input"); // Remove the input event for "pegawai"
    $("#nip").attr("maxlength", "18");
    // Handle pegawai
    $("#nip").on("input", function () {
      var nikValue = $(this).val();

      if (nikValue.length < 15) {
        $("#cariNikButton").addClass("disabled-button");
      } else {
        $("#cariNikButton").removeClass("disabled-button");
      }
    });

    $("#cariNikButton").on("click", function () {
      $("#loadingIndicator").show();
      var nikValue = $("#nip").val();
      var statusValue = $('input[name="statusRadio"]:checked').val();
      var statusValuePegawai = $('input[name="asnNonAsnRadio"]:checked').val();
      console.log(statusValuePegawai);
      console.log(statusValue);

      if (!statusValue) {
        // Show an alert using SweetAlert when no radio button is selected
        Swal.fire({
          icon: "error",
          title: "Pilih Status",
          text: 'Pilih status "Pegawai" atau "Tamu" sebelum klik "Cari".',
        });
        return; // Exit the function
      }

      if (statusValue === "pegawai") {
        if (statusValuePegawai === "asn") {
          apiEndpoint = "/api/pegawai/asn/";
        } else if (statusValuePegawai === "nonasn") {
          apiEndpoint = "/api/pegawai/non-asn/";
        } else {
          // Handle the case when 'statusValuePegawai' is not set
        }
      }

      if (statusValue === "tamu") {
        apiEndpoint = "/api/peserta/";
      }

      console.log(apiEndpoint);

      if (nikValue) {
        // Perform an AJAX request to check if the NIK exists
        $.ajax({
          url: apiEndpoint + nikValue, // Replace with your API endpoint
          type: "GET",
          success: function (data) {
            console.log(data.status);
            if (data.status === false) {
              // Handle the case where data is not found
              $("#no_hp, #nama, #alamat, #asal_instansi_option")
                .val("")
                .prop("readonly", false);
              $("#loadingIndicator").hide();
              // Show an alert using SweetAlert when NIK is not found
              Swal.fire({
                icon: "error",
                title: "NIP Tidak ditemukan.",
                text: "NIP tidak ditemukan. Cek kembali NIP anda dan coba lagi.",
              });
            } else {
              $("#loadingIndicator").hide();
              Swal.fire({
                icon: "success",
                title: "Success!",
                toast: "true",
                position: "top-end",
                text: "Silahkan melakukan tanda tangan.",
                showConfirmButton: false, // Optionally, hide the "OK" button
                timer: 4000, // Auto-close the toast after 2 seconds (adjust the duration as needed)
              });
              $("#signatureCanvas").removeClass("greyed-out-form");
              console.log(data);
              $("#nip").val(data.data.nip).prop("readonly", true);
              $("#no_hp").val(data.data.no_hp).prop("readonly", true);
              $("#nama").val(data.data.nama_lengkap).prop("readonly", true);
              $("#alamat").val(data.data.alamat).prop("readonly", true);
              $("#instansiOption, #asal_instansi_option")
                .val(data.data.ket_ukerja)
                .prop("readonly", true);
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // Handle errors if the AJAX request fails
            console.log("AJAX Error: " + textStatus);
          },
        });
      } else {
        $("#loadingIndicator").hide();
        // Show an alert using SweetAlert when NIK is empty
        Swal.fire({
          icon: "error",
          title: "NIK diperlukan",
          text: 'Masukkan nik sebelum klik "Cari".',
        });
      }
    });
  }
});

// Trigger the change event on 'nip' input when a radio button is clicked
$(".statusRadio").on("click", function () {
  $("#nip").val("").prop("readonly", false);
  var isTamu = $('input[name="statusRadio"]:checked').val();
  if (isTamu === "tamu") {
    $(
      "#no_hp, #nama, #alamat, #asal_instansi_tamu, #signatureCanvas"
    ).removeClass("greyed-out-form");
    $("#nip").removeClass("greyed-out-form");
    $("#cariNikButton").removeClass("disabled-button");
  } else {
    $("#cariNikButton").addClass("disabled-button");
    $(
      "#no_hp, #nama, #alamat, #asal_instansi_option, #signatureCanvas"
    ).addClass("greyed-out-form");
  }
  $('input[name="asnNonAsnRadio"]').on("change", function () {
    // Check if one of the radio buttons is selected
    if ($('input[name="asnNonAsnRadio"]:checked').length > 0) {
      $("#nip").removeClass("greyed-out-form");
      // $("#cariNikButton").removeClass("disabled-button");

      // REMOVE VALUE FORMS ON SWITCHING RADIO BUTTONS ASN/NON ASN
      // $("#nip, #no_hp, #nama, #alamat, #asal_instansi_option")
      //   .val("")
      //   .prop("readonly", false);
    }
    // $('#no_hp, #nama, #alamat, #asal_instansi_option').removeClass('greyed-out-form');
  });

  $(".asnNonAsnRadio").prop("checked", false);
  $(this).prop("checked", true);
  $('input[name="asnNonAsnRadio"]').prop("checked", false);
  // Check the clicked radio button
  $("#nip, #no_hp, #nama, #alamat, #asal_instansi_tamu")
    .val("")
    .prop("disabled", false);
  clearSignature();
  // Show/hide the 'instansiOption' and 'instansiText' divs based on the selected radio button
  if ($(this).val() === "pegawai") {
    $("#asnNonAsnContainer").show();
    $("#instansiOption").show();
    $("#instansiText").hide();
  } else {
    $("#asnNonAsnContainer").hide();
    $("#instansiOption").hide();
    $("#instansiText").show();
  }
});
// });
