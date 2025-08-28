<!-- Join Form Styles -->
<style>
    .registration-container {
        max-width: 600px;
        margin: 0 auto;
        background-color: white;
        padding: 30px;
        border-radius: 15px;
    }

    .step-indicator {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        gap: 15px;
    }

    .step {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
    }

    .step.active {
        background: var(--primary);
        color: white;
    }

    .form-step {
        display: none;
    }

    .form-step.active {
        display: block;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .registration-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--primary);
    }

    .registration-container input,
    .registration-container select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .registration-container select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
    }

    .time-options {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 10px;
        margin-top: 15px;
    }

    .time-option {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .time-option.selected {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
        gap: 15px;
    }

    .registration-container .btn {
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        flex: 1;
        opacity: 1 !important;
        display: inline-block !important;
        visibility: visible !important;
    }

    .btn-continue {
        background-color: var(--primary);
        color: white;
        border: none;
   
    }

    .btn-continue:hover {
    
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        opacity: 1 !important;
        color: var(--primary);
    }


    .btn-back {
        background-color: white;
        color: var(--primary);
        border: 1px solid var(--primary);
    }

    .btn-back:hover {

        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        opacity: 1 !important;
    }

    .success-message {
        text-align: center;
        padding: 40px;
        display: none;
    }

    .success-message h2 {
        color: var(--primary);
        margin-bottom: 20px;
    }

    .section-title {
        text-align: center;
    
    }

    .section-title h2 {
        color: var(--primary);
        margin-bottom: 15px;
        font-size: 24px;
    }

    .section-title p {
        color: #666;
        font-size: 15px;
        line-height: 1.6;
    }
</style>

<div class="registration-container">
    <div class="step-indicator">
        <div class="step active">1</div>
        <div class="step">2</div>
        <div class="step">3</div>
    </div>

    <!-- Step 1: Class Registration -->
    <div class="form-step active" data-step="1">
        <div class="section-title">
            <h2>Class Registration 🧘‍♂️</h2>
            <p class=" m-0 p-0">Begin your wellness journey with us. Choose your preferred class and schedule.</p>
        </div>

        <div class="form-group">
            <label for="main-category">Category</label>
            <select id="main-category" required>
                <option value="" disabled selected>Select Category</option>
                <option value="yoga">Yoga</option>
                <option value="meditation">Meditation</option>
                <option value="wellness">Wellness</option>
                <option value="learning">Learning</option>
                <option value="events">Events</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sub-category">Subcategory</label>
            <select id="sub-category" required disabled>
                <option value="" disabled selected>Select category first</option>
            </select>
        </div>

        <div class="form-group">
            <label for="session-date">Date</label>
            <input type="date" id="session-date" required>
        </div>

        <div class="form-group">
            <label>Session Time</label>
            <div class="time-options">
                <div class="time-option">5-6 AM</div>
                <div class="time-option">6-7 AM</div>
                <div class="time-option">7-8 AM</div>
                <div class="time-option">5-6 PM</div>
                <div class="time-option">6-7 PM</div>
                <div class="time-option">7-8 PM</div>
            </div>
        </div>
        <div class="button-group">
            <button type="button" class="btn btn-continue" onclick="showStep(2)">Continue</button>
        </div>
    </div>

    <!-- Step 2: Personal Information -->
    <div class="form-step" data-step="2">
        <div class="section-title">
            <h2>Personal Information</h2>
            <p>Tell us a bit about yourself so we can better serve you.</p>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="full-name">Full Name</label>
            <input type="text" id="full-name" placeholder="Your full name" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" id="country" placeholder="Your country" required>
        </div>
        <div class="button-group">
            <button type="button" class="btn btn-back" onclick="showStep(1)">Back</button>
            <button type="button" class="btn btn-continue" onclick="showStep(3)">Continue</button>
        </div>
    </div>

    <!-- Step 3: Payment -->
    <div class="form-step" data-step="3">
        <div class="section-title">
            <h2>Complete Registration</h2>
            <p>Secure your spot by completing the payment.</p>
        </div>
        <div class="form-group">
            <label for="card-number">Card Number</label>
            <input type="text" id="card-number" placeholder="4242 4242 4242 4242" required>
        </div>

        <div class="form-group">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div>
                    <label for="exp-date">Expiration</label>
                    <input type="text" id="exp-date" placeholder="MM/YY" required>
                </div>
                <div>
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" placeholder="123" required>
                </div>
            </div>
        </div>

        <div class="button-group">
            <button type="button" class="btn btn-back" onclick="showStep(2)">Back</button>
            <button type="button" class="btn btn-continue" onclick="submitForm()">Pay Now</button>
        </div>
    </div>

    <!-- Success Message -->
    <div class="success-message">
        <h2>🎉 Registration Successful!</h2>
        <p>Your class has been booked. We've sent a confirmation email.</p>
    </div>
</div>

<script>
const categoryData = {
    yoga: [
        "Basic Yoga",
        "Intermediate Yoga",
        "Advanced Yoga",
        "Pregnancy Yoga",
        "Back Pain Yoga",
        "Joint Pain Yoga",
        "Detox Yoga",
        "Chair Yoga"
    ],
    meditation: [
        "Depression Relief",
        "Anxiety Management",
        "Mental Wellness",
        "Breathing Techniques",
        "Mudras",
        "Concentration"
    ],
    wellness: [
        "Nutrition As Per Body Type",
        "Weight Management",
        "Diabetes Care",
        "Thyroid Management",
        "Blood Pressure Management",
        "Cholesterol Management",
        "Arthritis Care",
        "Fatty Liver Management"
    ],
    learning: [
        "Bhagvat Gita Class for Kids",
        "Public Speaking",
        "Slokas Recitation",
        "Srimat Bhagavat Mahapuran",
        "Book Club",
        "Nepali Language",
        "Sanskrit Language"
    ],
    events: [
        "Kids Online Book Club",
        "Adult Online Book Club",
        "Elderly Online Book Club",
        "Kids Online Slokas Recitation",
        "Kids Online Gita Reading"
    ]
};

let currentStep = 1;

function showStep(step) {
    if (step < 1 || step > 3) return;

    // Validate current step
    if (step > currentStep && !validateStep(currentStep)) return;

    // Update steps
    document.querySelector(`[data-step="${currentStep}"]`).classList.remove('active');
    currentStep = step;
    document.querySelector(`[data-step="${currentStep}"]`).classList.add('active');

    // Update step indicator
    document.querySelectorAll('.step').forEach((s, index) => {
        s.classList.toggle('active', index < currentStep);
    });
}

function validateStep(step) {
    if (step === 1) {
        const category = document.getElementById('main-category').value;
        if (!category) {
            alert('Please fill all required fields');
            return false;
        }
    }
    return true;
}

// Category/Subcategory handling
document.getElementById('main-category').addEventListener('change', function() {
    const sub = document.getElementById('sub-category');
    sub.disabled = false;
    sub.innerHTML = categoryData[this.value].map(opt =>
        `<option value="${opt.toLowerCase()}">${opt}</option>`
    ).join('');
});

// Time selection
document.querySelectorAll('.time-option').forEach(option => {
    option.addEventListener('click', function() {
        document.querySelectorAll('.time-option').forEach(opt =>
            opt.classList.remove('selected'));
        this.classList.add('selected');
    });
});

// Form submission
function submitForm() {
    document.querySelectorAll('.form-step').forEach(step => step.style.display = 'none');
    document.querySelector('.success-message').style.display = 'block';
    document.querySelectorAll('.step').forEach(step => step.classList.remove('active'));
}

// Set minimum date
document.getElementById('session-date').min = new Date().toISOString().split('T')[0];
</script>