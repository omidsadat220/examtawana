<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Tawana Technology Certificate</title>
    <link rel="stylesheet" href="" />

    <!-- Fonts -->
    <link
      href="{{ asset('https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800;900&display=swap') }}"
      rel="stylesheet"
    />

    <!-- Libraries -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js') }}"></script>

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        color-adjust: exact !important;
      }

      body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f0f0f0;
        padding: 20px;
      }


      /* ===== CERTIFICATE ===== */
      .certificate-container {
        position: relative;
        width: 297mm;
        height: 210mm;
        /* background: url("./bg1.png") center/cover no-repeat; */
        overflow: hidden;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
        /* background-color: red; */
        position: relative;
      }

      /* Header
      .cer-header {
        margin-top: 180px;
        padding-right: 90px;
        text-align: right;
        font-family: "Orbitron", sans-serif;
        font-size: 45px;
        color: #fff;
      } */

      .certificate-container {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
        /* background-color: red; */
      }

      .cer_text2 {
        margin-top: 43mm;
        height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 15px;
        /* border: 1px solid red; */
      }
      

      .container-h11 {
        font-size: 40px;
        background: transparent;
        color: #000;
        font-family: 'Orbitron', Georgia, "Times New Roman", Times, serif;
        text-transform: capitalize;
        font-weight: 800;
        width: 100%;
        text-align: center;
        letter-spacing: 1px;
        padding: 0px 59px;
        margin: 0;
        line-height: 2;
        white-space: normal;
        letter-spacing: 2px;
      }

      .container-h5 {
        font-size: 20px;
        background: transparent;
        color: #000;
        font-family: sans-serif, Georgia, "Times New Roman", Times, serif;
        text-transform: capitalize;
        font-weight: 600;
        width: 100%;
        text-align: center;
        letter-spacing: 1px;
        padding: 0px 59px;
        margin: 0;
        line-height: 1;
        white-space: normal;
        letter-spacing: 1px;
        /* border: 1px solid green; */
      }
      
      /* Text Section */
      .text-container {
        /* border: 1px solid rgb(38, 237, 7); */
        min-width: 60%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 190px;
        /* gap:10px; */
      }

      .container-h1 {
        font-size: 60px;
        border: none;
        outline: none;
        background: transparent;
        color: green;
        font-family: "Gill Sans", "Gill Sans MT", "Trebuchet MS", sans-serif;
        font-family:Edwardian Script ITC;
        text-transform: capitalize;
        font-weight: 600;
        width:100%;
        letter-spacing: 1px;
        margin: auto;
        line-height: 1.2;
        white-space: normal;
        text-align: center;
        /* background-color: red; */
      }

      .container-h1::placeholder {
        color: rgba(0, 128, 0, 0.6);
      }
      
      .container-p1 {
        font-size: 14px;
        letter-spacing: 0.5px;
        width: 100%;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 600;
        text-align: center;
        color: #000 !important;
        line-height: 2;
      }

      .subject {
        margin-top:20px;
        width: 100%;
        height: 10mm;
        /* background-color: green; */
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
      }


      /* Course Field */
      .field {
        /* position: absolute;
        top: 145mm;
        left: 30%; */
        width: 40%;
        text-align: center;
        font-size: 25px;
        background: transparent;
        border: none;
        outline: none;
        color: green;
        text-transform: uppercase;
        /* font-family: "Gill Sans", "Gill Sans MT", "Trebuchet MS", sans-serif; */
        /* font-family: sans-serif, Georgia, "Times New Roman", Times, serif; */
        font-family: 'Orbitron', Georgia, "Times New Roman", Times, serif;

        font-weight: 700;
        padding: 0;
        margin: auto;
        line-height: 1.2;
        white-space: normal;
        /* background-color: red; */
      } 

      .field::placeholder {
        color: rgba(0, 128, 0, 0.6);
      }

      .bottom_content {
        width: 100% !important;
        /* height: ; */
        /* background-color: #ccc !important; */
        /* border: 1px solid yellow !important; */
        position: absolute !important;
        bottom: 1mm !important;
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between !important;
        align-items: flex-end !important;
        padding: 15px 80px;
      }


      .qr-img {

        width:auto;
        height: auto;
        /* border-radius: 30px 30px 0 0; */
        display: flex;
        flex-direction: column;
        /* justify-content:left; */
        /* align-items: center; */
        /* border: 1px solid red;  */
      }

      .cer-link {
        color: #000 !important;
        font-family: sans-serif !important;
        text-decoration: none !important;
        display: inline-block !important;
        background-color: transparent !important;
        /* padding: 5px 10px !important; */
        font-size: 14px !important;
        /* border-radius: 5px !important; */
        /* letter-spacing: 2.4px !important; */
        width: max-content !important;
        text-align: center;
        /* background-color: red !important; */
        /* padding-right:40px !important; */
        letter-spacing: 1px !important;
        font-weight: 700 !important;

   
      }

      .cer-link:hover {
        text-decoration: underline;
      }

      .div_idcer {
        font-size: 13px !important;
        border: none !important;
        outline: none !important;
        font-family:
          sans-serif, Georgia, "Times New Roman", Times, serif !important;
        color: #000 !important;
        text-transform: capitalize;
        font-weight: 700;
      }


      .idcer {
        font-size: 12px !important;
        border: none !important;
        outline: none !important;
        font-family:
          sans-serif, Georgia, "Times New Roman", Times, serif !important;
        color: #000 !important;
        margin: 5px  0px 0px !important;
        padding: 1px 0px 2px 0px  !important;
        text-align: center !important;
        white-space: normal !important;
        /* border: 1px solid red; */
        z-index: 1; 
        text-transform: capitalize;
      }

      .qc-shadow {
        /* position: absolute;
        bottom: -10px; */
        /* left: 15px; */
        /* width: 25mm;
        height: 25mm;
        margin: auto; */
        /* border-radius: 30px 30px 0 0; */
        /* background: transparent; */
        /* box-shadow: 0 0 18px rgba(130, 136, 156, 0.9); */
        /* border: 1px solid red; */
      }

      .qc {
        /* width: 100%;
        height: 100%;
        padding: 0px; */
        /* background-color: #0f1824; */
        /* display: flex;
        justify-content: center;
        align-items: center; */

      }

      /* Remove pseudo-element as it causes issues with html2canvas */
      .qc::after {
        /* width: 35mm;
        height: 35mm;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        align-content: center; */
        /* border: 1px solid green; */
        /* /* pointer-events: none; */
      }

      .qc_outline {
        /* width: 35mm !important;
        height: 35mm !important; */
        /* margin-left: -5px !important; */
        /* border: 5px double #fff !important; */
        /* outline: 10px double #fff !important; */
        /* border-radius: 10px !important; */
        /* border: 1px solid yellow; */
/* 
        background-color: transparent !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important; */
      }
      
      .qc_border {
        /* width: 26mm !important;
        height: 26mm !important; */
        /* border: 5px double #fff !important; */
        /* outline: 10px double #fff !important; */
        /* border-radius: 10px !important; */
        /* background-color: green !important; */
        /* display: flex !important;
        justify-content: center !important;
        align-items: center !important; */
      }

      .barcode-img {
        width: 23mm !important;
        height: 23mm !important;
        /* border: 5px double #fff !important; */
        /* outline: 10px double #fff !important; */
        /* border-radius: 10px !important; */
        background-color: #fff !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
      }
      /* ---------------------- */

      .container-logos {
        /* color: #000 !important; */
        /* font-size: 16px !important; */
        letter-spacing: 1px !important;
        /* padding: 10px !important; */
        width: max-content !important; 
        height: 130px;
        display: flex !important;
        flex-direction: row !important ;
        justify-content: center !important;
        align-content: center !important;
        /* gap: 5px !important; */
        z-index: 1;
        /* background-color: #ccc; */
        /* border:1px solid red; */
        margin-right: -20px;
        margin-bottom: -10px;
      }

      
      .date-span {
        font-size: 13px !important;
        border: none !important;
        outline: none !important;
        font-family:
          sans-serif, Georgia, "Times New Roman", Times, serif !important;
        color: #000 !important;
        /* padding: 5px !important; */
        min-width: 130px !important;
        letter-spacing: 1px !important;
        text-align: left !important;
        /* line-height: 1 !important; */
        white-space: normal !important;
        background-color: transparent !important;
        font-weight: 700;
        /* margin:5px 0px 0px  0px ; */
        /* margin-top: -15px !important; */
        /* border: 1px solid #000; */


      }

      .date-span::placeholder {
        /* color: rgba(204, 204, 204, 0.7) !important; */
        color: #000;
      }



      .date_option {
        /* display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
        align-items: center !important; */
        /* border: 1px solid red; */
        /* gap: 10px !important; */
        /* width: 46%;
        height: 100px; */
        /* margin-top: 32px; */
        /* background-color: green !important; */
      }
      

      .certification {
        /* background-color: transparent !important;
        padding: 5px 10px !important;
        font-size: 20px !important;
        border-radius: 5px !important;
        letter-spacing: 1px !important;
        color: #000 !important;
        text-align: center !important;
        width: max-content !important; */
        /* position:absolute; */
        /* top: 60px; */
        /* border: 1px solid red; */
        /* font-weight: 700; */
        /* background-color: red;  */


      }
      
/* 
      .cer_id {
        background-color: transparent !important;
        padding: 5px 10px !important;
        font-size: 25px !important;
        letter-spacing: 1px !important;
        color: #000000 !important;
        text-align: center;

        border-bottom: 1px solid #000;
        font-weight: 700 !important;
        width: 180px;
        margin-top: 20px;
      } */

      .ver {
        /* background-color: transparent !important;
        padding: 5px 10px !important;
        font-size: 20px !important;
        letter-spacing: 1px !important;
        color: #000 !important;
        text-align: center !important;
        width: 200px !important; */
      }
      /* Signature */
      .signature {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: flex-end !important;
        z-index: 1 !important;
        width: 140px;
        /* border:1px solid red; */
      }

      .signature img {
        width: 31mm;
        height:18mm;
        filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.3));
        border-bottom:1px solid #000;
        padding : 0px 0px 5px 0px !important

      }

      .date1{
       /* border:1px solid green; */
        display: flex;
        /* justify-content: center; */
        align-items: flex-end !important;
        font-size: 14px;
      }

      .ceo {
        /* border-top: 1px solid #000; */
        display: block;
        margin-top: 1px;
        /* padding-top: 5px; */
        font-size: 12px;
        text-align: left;
        color: #000000 !important;
        font-family: sans-serif !important;
        letter-spacing: 1px;
        font-weight: 700 !important;
      }

      /* ===== Buttons ===== */

      a .button-container {
        display: flex;
        gap: 15px;
        margin: 25px;
        flex-wrap: wrap;
        justify-content: center;
      }


      /*  buttons style */
      button {
        margin: 10px;
        padding: 12px 35px;
        font-size: 16px;
        border-radius: 25px;
        border: none;
        background: linear-gradient(135deg, #1ec26b, #0d8b4c);
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(30, 194, 107, 0.3);
        font-family: "Orbitron", sans-serif;
        font-weight: 600;
        letter-spacing: 1px;
      }

      button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(30, 194, 107, 0.4);
      }

      button:active {
        transform: translateY(1px);
      }

      .print-button {
        background: linear-gradient(135deg, #4285f4, #0d47a1);
        box-shadow: 0 4px 12px rgba(66, 133, 244, 0.3);
      }

      .print-button:hover {
        box-shadow: 0 6px 18px rgba(66, 133, 244, 0.4);
      }

      .png-button {
        background: linear-gradient(135deg, #ff6b6b, #c62828);
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
      }

      .png-button:hover {
        box-shadow: 0 6px 18px rgba(255, 107, 107, 0.4);
      }

      .certificate-container {
        position: relative;
        width: 297mm;
        height: 210mm;
        overflow: hidden;
      }

      /* بکگروند واقعی */
      .certificate-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
      }

      /* همه محتوا بیاید روی عکس */
      .certificate-container > *:not(.certificate-bg) {
        position: relative;
        z-index: 1;
      }

      /* استایل برای پرینت */
      @media print {
        body * {
          visibility: hidden;
        }

        #certificate,
        #certificate * {
          visibility: visible;
        }

        #certificate {
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
        }

        .qc {

          color-adjust: exact !important;
        }

        .barcode-img {
          border: 5px double #fff !important;
          outline: 10px double #fff !important;
        }

        .signature img {
          filter: none !important;
        }

        /* استایل برای spanهای جایگزین inputها */
   
      }
      @media print {
        .qc {
          overflow: visible !important;
          /* box-shadow: 0 0 15px #82889c !important; */
        }
      }

      /* برای نمایش بهتر در صفحه‌های کوچک */
      @media (max-width: 1200px) {
        .certificate-container {
          transform: scale(0.85);
          transform-origin: top center;
        }
      }

      @media (max-width: 768px) {
        .certificate-container {
          transform: scale(0.7);
        }

        .button-container {
          flex-direction: column;
          align-items: center;
        }

        button {
          width: 280px;
        }
      }

      @media print {
        img {
          image-rendering: auto !important;
        }

        .certificate-container {
          -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
        }
      }
    </style>
  </head>

    @php
      $certificate = $result->certificate;
      $category = $result->category;
    @endphp

  <body>
    <div id="certificate" class="certificate-container">
      <img src="{{ asset('upload/cer_final/cer2bg.png') }}" class="certificate-bg" alt="bg" />
      <div class="cer_text2">
        <h4 type="text" class="container-h11">Certificate of Completion</h4>
        <h5 type="text" class="container-h5">
          This certificate is proudly presented to
        </h5>
      </div>

      <div class="text-container">
        <input
          type="text"
          class="container-h1 editable"
          {{-- placeholder="USER_NAME" --}}
          id="userName"
          value="{{ $certificate->first_name ?? $result->user->name }}"
        />
        <p class="container-p1">
          In recognition of the successful completion of the training program. <br>
          This certificate is awarded as a mark of dedication, effort, and commitment shown throughout the learning process. <br>
          The recipient has demonstrated strong skills, discipline, and a positive learning attitude.
        </p>
      </div>
      
        <div class="subject">
          <input
            type="text"
            class="field editable"
            placeholder="( CYBER SECURITY )"
            id="courseName"
            value="{{ $category->uni_name ?? 'No Category' }}"
          /> 
        </div>

      <div class="bottom_content">
        <div class="qr-img">
          <div class="qc-shadow">
            <div class="qc">
              <div class="qc_outline">
                <div class="qc_border">
                  <div id="qr-code" class="barcode-img"></div>
                </div>
              </div>
            </div>
          </div>
          
        <div class="div_idcer">ID:
            <input
            type="text"
            class="date-span editable  idcer"
            placeholder="TA123456"
            id="verificationCode" 
          />
        </div>
        <a class="cer-link" href="#">tawanatechnology.com/certificate</a>
          
        
      
        </div>
        <div class="container-logos">
          
          <div class="signature">
              <img src="{{ asset('upload/cer_final/./111.png') }}" alt="Signature" />
              <div class="date1">
                Date:               
                <input
                type="text"
                class="date-span editable  idcer"
                placeholder=" 02/03/2026"
                id="verificationCode"   
              />
              </div>
              <span class="ceo"> CEO Roman Noori</span>

        </div>
        </div>
      </div>

      <!-- <div class="line"></div> -->
    </div>
    <div class="button-container">
      <button onclick="downloadPDF()">📄 Download PDF</button>
      <button onclick="downloadAsPNG()" class="png-button">
        🖼️ Download PNG
      </button>
    </div>

    <!-- PDF Script -->
    <script>
      async function downloadPDF() {
        try {
          const { jsPDF } = window.jspdf;
          const cert = document.getElementById("certificate");

          // جایگزینی inputها با span (مثل قبل)
          const inputs = document.querySelectorAll(".editable");
          const originalInputs = [];
          const spans = [];

          inputs.forEach((input, index) => {
            originalInputs[index] = input;

            const span = document.createElement("span");
            span.textContent = input.value || input.placeholder;

            const cs = getComputedStyle(input);
            span.style.cssText = `
              font-family:${cs.fontFamily};
              font-size:${cs.fontSize};
              font-weight:${cs.fontWeight};
              color:${cs.color};
              letter-spacing:${cs.letterSpacing};
              text-transform:${cs.textTransform};
              position:${cs.position};
              width:${cs.width};
              text-align:${cs.textAlign};
              padding:${cs.padding};
              margin:${cs.margin};
              line-height:${cs.lineHeight};
              border:${cs.border};
              white-space:${cs.whiteSpace};
            `;

            spans[index] = span;
            input.parentNode.replaceChild(span, input);
          });

          await new Promise((r) => setTimeout(r, 150));

          // 🔥 canvas با کیفیت خیلی بالا
          const canvas = await html2canvas(cert, {
            scale: 5, // ⭐ مهم‌ترین تغییر
            useCORS: true,
            backgroundColor: null,
            allowTaint: true,
            imageTimeout: 10000,
          });

          const imgData = canvas.toDataURL("image/png", 1.0);

          // 📐 محاسبه دقیق سایز PDF بر اساس canvas
          const imgWidth = 297; // A4 landscape
          const imgHeight = (canvas.height * imgWidth) / canvas.width;

          const pdf = new jsPDF({
            orientation: "landscape",
            unit: "mm",
            format: [imgWidth, imgHeight],
            compress: false, // ⭐ جلوگیری از افت کیفیت
          });

          pdf.addImage(
            imgData,
            "PNG",
            0,
            0,
            imgWidth,
            imgHeight,
            undefined,
            "FAST",
          );

          // بازگرداندن inputها
          spans.forEach((span, i) => {
            if (span.parentNode) {
              span.parentNode.replaceChild(originalInputs[i], span);
            }
          });

          pdf.save("Tawana-Certificate-HD.pdf");
        } catch (err) {
          console.error(err);
          alert("خطا در ساخت PDF");
        }
      }

      async function downloadAsPNG() {
        try {
          const cert = document.getElementById("certificate");

          // جایگزینی موقت inputها
          const inputs = document.querySelectorAll(".editable");
          const originalInputs = [];
          const spans = [];

          inputs.forEach((input, index) => {
            originalInputs[index] = input;

            const span = document.createElement("span");
            span.textContent = input.value || input.placeholder;

            const computedStyle = window.getComputedStyle(input);
            span.style.fontFamily = computedStyle.fontFamily;
            span.style.fontSize = computedStyle.fontSize;
            span.style.color = computedStyle.color;
            span.style.fontWeight = computedStyle.fontWeight;
            span.style.textTransform = computedStyle.textTransform;
            span.style.position = computedStyle.position;
            span.style.left = computedStyle.left;
            span.style.top = computedStyle.top;
            span.style.width = computedStyle.width;
            span.style.textAlign = computedStyle.textAlign;

            span.style.backgroundColor = computedStyle.backgroundColor;
            span.style.borderRadius = computedStyle.borderRadius;
            span.style.boxShadow = computedStyle.boxShadow;

            span.style.whiteSpace = computedStyle.whiteSpace;
            span.style.display = computedStyle.display;
            span.style.padding = computedStyle.padding;
            span.style.margin = computedStyle.margin;
            span.style.border = computedStyle.border;
            span.style.height = computedStyle.height;
            span.style.lineHeight = computedStyle.lineHeight;

            spans[index] = span;
            input.parentNode.replaceChild(span, input);
          });

          await new Promise((r) => setTimeout(r, 100));

          const canvas = await html2canvas(cert, {
            scale: 3,
            useCORS: true,
            backgroundColor: null,
            foreignObjectRendering: false,
            logging: false,
            allowTaint: true,
            onclone: function (clonedDoc) {
              const qcElement = clonedDoc.querySelector(".qc");
              if (qcElement) {
                // qcElement.style.backgroundColor = "#0f1824";
                // qcElement.style.boxShadow = "0 0 15px #82889c !important";
                qcElement.style.border = "1px solid transparent";
              }

              const barcodeElement = clonedDoc.querySelector(".barcode-img");
              if (barcodeElement) {
                barcodeElement.style.boxShadow = "0 0 15px #82889c !important";
              }

              const allElements = clonedDoc.querySelectorAll("*");
              allElements.forEach((el) => {
                el.style.visibility = "visible";
                el.style.opacity = "1";
                if (el.classList.contains("barcode-img")) {
                  el.style.border = "1px solid transparent";
                }
              });
            },
          });

          const link = document.createElement("a");
          link.download = "Tawana-Certificate.png";
          link.href = canvas.toDataURL("image/png");
          link.click();

          // بازگرداندن inputها
          spans.forEach((span, index) => {
            if (span.parentNode && originalInputs[index]) {
              span.parentNode.replaceChild(originalInputs[index], span);
            }
          });
        } catch (error) {
          console.error("Error generating PNG:", error);
          alert("خطا در تولید PNG. لطفا دوباره تلاش کنید.");
        }
      }

      function printCertificate() {
        // جایگزینی موقت برای پرینت
        const inputs = document.querySelectorAll(".editable");
        const replacements = [];

        inputs.forEach((input) => {
          const span = document.createElement("span");
          span.textContent = input.value || input.placeholder;

          const computedStyle = window.getComputedStyle(input);
          span.style.fontFamily = computedStyle.fontFamily;
          span.style.fontSize = computedStyle.fontSize;
          span.style.color = computedStyle.color;
          span.style.fontWeight = computedStyle.fontWeight;
          span.style.textTransform = computedStyle.textTransform;
          // span.style.letterSpacing = computedStyle.letterSpacing;
          span.style.position = computedStyle.position;
          span.style.left = computedStyle.left;
          span.style.top = computedStyle.top;
          span.style.width = computedStyle.width;
          span.style.textAlign = computedStyle.textAlign;

          // span.style.backgroundColor = computedStyle.backgroundColor;
          span.style.borderRadius = computedStyle.borderRadius;
          span.style.boxShadow = computedStyle.boxShadow;

          span.style.whiteSpace = computedStyle.whiteSpace;
          span.style.display = computedStyle.display;
          span.style.padding = computedStyle.padding;
          span.style.margin = computedStyle.margin;
          span.style.border = computedStyle.border;
          span.style.outline = computedStyle.outline;
          span.style.height = computedStyle.height;
          span.style.lineHeight = computedStyle.lineHeight;

          replacements.push({ input: input, span: span });
          input.parentNode.replaceChild(span, input);
        });

        // اطمینان از نمایش صحیح شادو و بوردر
        const qcElement = document.querySelector(".qc");
        let originalQcShadow = "";
        if (qcElement) {
          originalQcShadow = qcElement.style.boxShadow;
          qcElement.style.boxShadow = "0 0 15px #82889c !important";
        }

        const barcodeElement = document.querySelector(".barcode-img");
        let originalBarcodeShadow = "";
        if (barcodeElement) {
          originalBarcodeShadow = barcodeElement.style.boxShadow;
          barcodeElement.style.boxShadow = "0 0 15px #82889c !important";
        }

        // پرینت
        window.print();

        // بازگرداندن پس از پرینت
        setTimeout(() => {
          replacements.forEach((item) => {
            if (item.span.parentNode) {
              item.span.parentNode.replaceChild(item.input, item.span);
            }
          });

          // بازگرداندن استایل‌های اصلی
          if (qcElement) {
            qcElement.style.boxShadow = originalQcShadow;
          }
          if (barcodeElement) {
            barcodeElement.style.boxShadow = originalBarcodeShadow;
          }
        }, 2000);
      }
    </script>

    <!-- QR Code -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // ایجاد QR کد
        const qrCodeElement = document.getElementById("qr-code");

        function updateQRCode() {
          // پاک کردن QR کد قبلی
          qrCodeElement.innerHTML = "";
          const verificationInput = document.getElementById("verificationCode");
          const text = verificationInput.value || verificationInput.placeholder;

          // ایجاد QR کد جدید
          new QRCode(qrCodeElement, {
            text: text,
            width: 85,
            height: 85,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H,
          });
        }

        // مقداردهی اولیه
        updateQRCode();

        // بروزرسانی QR کد با تغییر ورودی
        const verificationInput = document.getElementById("verificationCode");
        if (verificationInput) {
          verificationInput.addEventListener("input", updateQRCode);
        }

        // پر کردن داده‌های نمونه برای تست
        // document.getElementById("userName").value = "Hashmatullah Mohmmadi";
        // document.getElementById("courseName").value = "( CYBER SECURITY )";
        document.getElementById("certDate").value = "January 15 2025";
        document.getElementById("verificationCode").value = "TawanaA2567";

        // بروزرسانی QR کد با داده‌های نمونه
        setTimeout(updateQRCode, 100);
      });
    </script>

    <script></script>
  </body>
</html>
