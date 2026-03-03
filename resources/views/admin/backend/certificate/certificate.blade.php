<!DOCTYPE html>
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
        background: url(" {{ asset('upload/cer_final/3.png') }}") center/cover no-repeat;
        overflow: hidden;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
      }
      /* Header */
      .cer-header {
        margin-top: 180px;
        padding-right: 90px;
        text-align: right;
        font-family: "Orbitron", sans-serif;
        font-size: 45px;
        color: #fff;
      }

      /* Text Section */
      .text-container {
        margin-top: 105mm;
        padding-left: 90px;
        /* border: 1px solid red; */
        min-width: 60%;
      }

      .container-h1 {
        font-size: 30px;
        border: none;
        outline: none;
        background: transparent;
        color: green;
        /* font-family: "Orbitron", sans-serif; */
        font-family: "Gill Sans", "Gill Sans MT", "Trebuchet MS", sans-serif;
        font-family: sans-serif, Georgia, "Times New Roman", Times, serif;
        text-transform: uppercase;
        font-weight: 600;
        width: 100%;
        max-width: 500px;
        letter-spacing: 1px;
        padding: 0;
        margin: 0;
        line-height: 1.2;
        white-space: normal;
      }

      .container-h1::placeholder {
        color: rgba(0, 128, 0, 0.6);
      }

      .container-p1 {
        font-size: 27px;
        letter-spacing: 2px;
        padding-top: 10px;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 600;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        color: #82889c;
      }

      /* Course Field */
      .field {
        position: absolute;
        top: 140mm;
        left: 30%;
        width: 40%;
        text-align: center;
        font-size: 32px;
        background: transparent;
        border: none;
        outline: none;
        color: green;
        text-transform: uppercase;
        /* font-family: "Gill Sans", "Gill Sans MT", "Trebuchet MS", sans-serif; */
        font-family: sans-serif, Georgia, "Times New Roman", Times, serif;
        font-weight: 700;
        padding: 0;
        margin: 0;
        line-height: 1.2;
        white-space: normal;
      }

      .field::placeholder {
        color: rgba(0, 128, 0, 0.6);
      }
      .qr-img {
        position: absolute;
        bottom: 0mm;
        left: 100px;
        width: 55mm;
        height: 55mm;
        /* border: 1px solid red; */
        border-radius: 30px 30px 0 0;
        display: flex;
        justify-content: center;
        align-items: flex-end !important;
        background-image: url(" {{ asset('upload/cer_final/q.png') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

      .qc-shadow {
        position: absolute;
        bottom: 7px;
        left: 15px;
        width: 47mm;
        height: 47mm;
        margin: auto;
        border-radius: 30px 30px 0 0;
        background: transparent;
        /* box-shadow: 0 0 18px rgba(130, 136, 156, 0.9); */
      }

      .qc {
        width: 100%;
        height: 100%;
        padding: 8px;
        background-color: #0f1824;
        border-radius: 30px 30px 0 0;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      /* Remove pseudo-element as it causes issues with html2canvas */
      .qc::after {
        content: "";
        position: absolute;
        inset: 0;
        width: 50mm;
        height: 50mm;
        border-radius: 30px 30px 0 0;
        /* box-shadow: 0 0 20px #82889c; */
        /* border: 1px solid red; */
        pointer-events: none;
      }

      .qc_outline {
        width: 37.5mm !important;
        height: 37mm !important;
        /* border: 5px double #fff !important; */
        /* outline: 10px double #fff !important; */
        border-radius: 10px !important;
        background-color: rgb(255, 255, 255) !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
      }

      .qc_border {
        width: 35mm !important;
        height: 35mm !important;
        /* border: 5px double #fff !important; */
        /* outline: 10px double #fff !important; */
        border-radius: 10px !important;
        background-color: rgb(0, 0, 0) !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
      }

      .barcode-img {
        width: 32mm !important;
        height: 32mm !important;
        /* border: 5px double #fff !important; */
        /* outline: 10px double #fff !important; */
        border-radius: 10px !important;
        background-color: #fff !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
      }
      /* ---------------------- */

      .container-logos {
        position: absolute !important;
        bottom: 5mm !important;
        left: 85mm !important;
        color: #fff !important;
        font-size: 16px !important;
        letter-spacing: 1px !important;
        padding: 10px !important;
        width: 60% !important;
        display: flex !important;
        flex-direction: column !important ;
        justify-content: flex-start !important;
        align-content: center !important;
        gap: 5px !important;
        background-color: #111c2a;
        z-index: 1;
      }

      .date-span {
        font-size: 20px !important;
        background-color: #0f1824 !important;
        border: none !important;
        outline: none !important;
        font-family: sans-serif, Georgia, "Times New Roman", Times, serif !important;
        color: #82889c;
        padding: 5px !important;
        min-width: 150px !important;
        text-align: left !important;
        letter-spacing: 2px !important;
        box-shadow: 0px 0px 5px #212221 !important;
        text-align: left !important;
        margin: 0 !important;
        line-height: 1.2 !important;
        white-space: normal !important;
      }

      .date-span::placeholder {
        color: rgba(204, 204, 204, 0.7) !important;
      }

      .cer_text {
        display: flex !important;
        flex-direction: row !important;
        justify-content: flex-start !important;
        align-items: center !important;
        /* border: 1px solid red; */
        gap: 5px !important;
      }

      .certification {
        background-color: #0f1824 !important;
        padding: 10px !important;
        font-size: 20px !important;
        border-radius: 5px !important;
        box-shadow: 0px 0px 5px #212221 !important;
        letter-spacing: 1px !important;
        color: #82889c !important;
        text-align: left !important;
        width: max-content !important;
      }

      .ver {
        background-color: #0f1824 !important;
        padding: 10px !important;
        font-size: 20px !important;
        border-radius: 5px !important;
        box-shadow: 0px 0px 5px #212221 !important;
        letter-spacing: 1px !important;
        color: #82889c !important;
        text-align: left !important;
        /* width: max-content !important; */
        width: 200px !important;
      }

      .cer_id {
        background-color: #0f1824 !important;
        padding: 10px !important;
        font-size: 20px !important;
        border-radius: 5px !important;
        box-shadow: 0px 0px 5px #212221 !important;
        letter-spacing: 1px !important;
        color: #82889c !important;
        text-align: left !important;
        /* width: max-content !important; */
        width: 200px !important;
      }

      .cer-link {
        color: #82889c;
        font-family: sans-serif !important;
        font-size: 18px;
        text-decoration: none !important;
        display: inline-block !important;
        background-color: #0f1824 !important;
        padding: 10px !important;
        font-size: 20px !important;
        border-radius: 5px !important;
        box-shadow: 0px 0px 5px #212221 !important;
        letter-spacing: 1px !important;
        width: 72%;
        text-align: left;
      }

      .cer-link:hover {
        text-decoration: underline;
      }

      /* Signature */
      .signature {
        position: absolute;
        bottom: 10mm;
        right: 30mm;
        text-align: center;
        z-index: 1 !important;
      }

      .signature img {
        width: 45mm;
        height: 100px;
        filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.3));
      }

      .ceo {
        display: block;
        margin-top: 5px;
        font-size: 14px;
        color: #82889c;
        font-family: sans-serif !important;
        letter-spacing: 1px;
      }
      .line {
        width: 650px !important;
        height: 10px !important;
        /* background: #477931; */

        position: absolute !important;
        bottom: 50px !important;
        right: 36mm !important;
        /* box-shadow: 0 15px 10px #477931 !important; */
        box-shadow: 0 15px 10px #82889c !important;

        /* z-index: -1 !important;قرار دادن در پشت سایر عناصر */
      }

      /* ===== Buttons ===== */

      a .button-container {
        display: flex;
        gap: 15px;
        margin: 25px;
        flex-wrap: wrap;
        justify-content: center;
      }

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
          background: url(" {{ asset('upload/cer_final/3.png') }}") center/cover no-repeat !important;
        }

        .qc {
          box-shadow: 0 0 15px #82889c !important;
          -webkit-print-color-adjust: exact !important;
          print-color-adjust: exact !important;
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
        span {
          -webkit-print-color-adjust: exact !important;
          print-color-adjust: exact !important;
          /* background: transparent !important; */
        }
      }
      @media print {
        .qc {
          overflow: visible !important;
          box-shadow: 0 0 15px #82889c !important;
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
    </style>
  </head>

  @php
    $certificate = $result->certificate;
    $category = $result->category;
  @endphp
  
  <body>
    <div id="certificate" class="certificate-container">
      <div class="text-container">
        <input
          type="text"
          class="container-h1 editable"
          value="{{ $certificate->first_name ?? $result->user->name }}"
        />
        <p class="container-p1">
          This certificate is proudly awarded in recognition of outstanding
          <br />
          effort, dedication, and excellent performance.
        </p>
      </div>

      <input
        type="text"
        class="field editable"
        value="{{ $category->uni_name ?? 'No Category' }}"
        id="courseName"
      />

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
      </div>

      <div class="container-logos">
        <div class="cer_text">
          <span class="ver" style="padding: 0px 5px"> Verification:</span>
          <input
            type="text"
            class="date-span editable certification"
            placeholder="TawanaA2567"
            id="verificationCode"
          />
        </div>
        <div class="cer_text">
          <span class="cer_id">Certificate Date:</span>
          <input
            type="text"
            class="date-span certification editable"
            placeholder="January 15 2025"
            id="certDate"
          />
        </div>

        <a class="cer-link" href="#"
          >https://www.tawanatechnology.com/certificate</a
        >
      </div>

      <div class="signature">
        <img src="{{asset('upload/cer_final/sn3.png')}}" alt="Signature" />
        <span class="ceo"> CEO Roman Noori</span>
      </div>
      <!-- <div class="line"></div> -->
    </div>
    <div class="button-container">
      <button onclick="downloadPDF()">📄 Download PDF</button>
      <button onclick="downloadAsPNG()" class="png-button">
        🖼️ Download PNG
      </button>
      <!-- <button onclick="printCertificate()" class="print-button">
        🖨️ Print Certificate
      </button> -->
    </div>

    <!-- PDF Script -->
    <script>
      async function downloadPDF() {
        try {
          const { jsPDF } = window.jspdf;
          const cert = document.getElementById("certificate");

          // ذخیره مقادیر اصلی
          const inputs = document.querySelectorAll(".editable");
          const originalInputs = [];
          const spans = [];

          // جایگزینی inputها با span
          inputs.forEach((input, index) => {
            originalInputs[index] = input;

            const span = document.createElement("span");
            span.textContent = input.value || input.placeholder;

            // کپی استایل‌ها از input
            const computedStyle = window.getComputedStyle(input);
            span.style.fontFamily = computedStyle.fontFamily;
            span.style.fontSize = computedStyle.fontSize;
            span.style.color = computedStyle.color;
            span.style.fontWeight = computedStyle.fontWeight;
            span.style.textTransform = computedStyle.textTransform;
            span.style.letterSpacing = computedStyle.letterSpacing;
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

            // برای فیلدهای خاص
            if (
              input.classList.contains("container-h1") ||
              input.classList.contains("field")
            ) {
              span.style.color = "green";
            }

            spans[index] = span;
            input.parentNode.replaceChild(span, input);
          });

          // تاخیر برای رندر شدن DOM
          await new Promise((r) => setTimeout(r, 100));

          const canvas = await html2canvas(cert, {
            scale: 3, // افزایش کیفیت
            useCORS: true,
            backgroundColor: null,
            foreignObjectRendering: false,
            logging: false,
            allowTaint: true,

            // تنظیمات برای نمایش بهتر box-shadow و background-color
            onclone: function (clonedDoc) {
              // اطمینان از نمایش background-color
              const qcElement = clonedDoc.querySelector(".qc");
              if (qcElement) {
                qcElement.style.backgroundColor = "#0f1824";
                qcElement.style.boxShadow = "0 0 15px #82889c !important";
                qcElement.style.border = "1px solid transparent"; // کمک به رندر شدن شادو در بعضی مرورگرها
              }

              const barcodeElement = clonedDoc.querySelector(".barcode-img");
              if (barcodeElement) {
                barcodeElement.style.boxShadow = "0 0 15px #82889c !important";
              }

              // اطمینان از نمایش همه عناصر
              const allElements = clonedDoc.querySelectorAll("*");
              allElements.forEach((el) => {
                el.style.visibility = "visible";
                el.style.opacity = "1";
                // اضافه کردن border برای بهتر رندر شدن شادو
                if (el.classList.contains("barcode-img")) {
                  el.style.border = "1px solid transparent";
                }
              });
            },
          });

          const img = canvas.toDataURL("upload/cer_final/png", 1.0);

          const pdf = new jsPDF({
            orientation: "landscape",
            unit: "mm",
            format: "a4",
          });

          pdf.addImage(img, "PNG", 0, 0, 297, 210);

          // بازگرداندن inputها
          spans.forEach((span, index) => {
            if (span.parentNode && originalInputs[index]) {
              span.parentNode.replaceChild(originalInputs[index], span);
            }
          });

          pdf.save("Tawana-Certificate.pdf");
        } catch (error) {
          console.error("Error generating PDF:", error);
          alert("خطا در تولید PDF. لطفا دوباره تلاش کنید.");

          // تلاش برای بازگرداندن inputها در صورت خطا
          try {
            const spans = document.querySelectorAll(
              'span[style*="inline-block"]'
            );
            spans.forEach((span) => {
              const originalId = span.textContent || "";
              // این یک راه‌حل ساده است - در پروژه واقعی بهتر است mapping داشته باشیم
            });
          } catch (e) {
            console.error("Error restoring inputs:", e);
          }
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
                qcElement.style.backgroundColor = "#0f1824";
                qcElement.style.boxShadow = "0 0 15px #82889c !important";
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
          link.href = canvas.toDataURL("upload/cer_final/png");
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
          span.style.letterSpacing = computedStyle.letterSpacing;
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
        }, 1000);
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
            width: 110,
            height: 110,
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
        // document.getElementById("userName").value = "Roman Noori";
        // document.getElementById("courseName").value = "( CYBER SECURITY )";
        document.getElementById("certDate").value = "January 15 2025";
        document.getElementById("verificationCode").value = "TawanaA2567";

        // بروزرسانی QR کد با داده‌های نمونه
        setTimeout(updateQRCode, 100);
      });
    </script>
  </body>
</html>
