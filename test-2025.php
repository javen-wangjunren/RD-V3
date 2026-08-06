<?php
// =============================================================================
// TEMPLATE NAME: Test 2025
// -----------------------------------------------------------------------------
// =============================================================================
get_header();
?>
<style>
    .cq-popup {
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  background: rgba(0,0,0,0.7);
  display: flex; justify-content: center; align-items: center;
  z-index: 9999;
}
.hidden { display: none; }

.cq-screen {
  background: #fff;
  width: 1080px;
  padding: 40px;
  border-radius: 0px;
  text-align: center;
}

#qOptions button {
  width: 100%;
  padding: 12px;
  margin: 10px 0;
  border: 1px solid #ddd;
  border-radius: 12px;
  background: #f8f8f8;
  cursor: pointer;
}

#qOptions button:hover{
  background: #eee;
}

.coupon-box {
  margin-top: 20px;
  display: flex;
  justify-content: center;
  gap: 10px;
}

.cq-progress {
  font-size: 18px;
  /* margin-bottom: 15px; */
}

.cq-prize-strip {
  margin: auto;
  margin-top: 40px;
  display: flex;
  max-width: 720px;
  justify-content: space-evenly;
  column-gap: 12px;
}
.cq-prize-strip img { max-width: 180px; width: 100%; display: block;}

.open-btn {
  margin: 20px;
  padding: 10px 20px;
}
.text-white{
  color: white;
}
.even-rules-cristmas{
  background-color: rgba(255, 255, 255, 0.85);
  border-radius: 20px;
  backdrop-filter: blur(10);
  padding: 16px;
  text-align: left;
  margin: auto;
  margin-top: 30px;
  margin-bottom: 20px;
  max-width: 620px;
  padding-left: 40px;
}
.even-rules-cristmas h4{
  margin-top: 8px;
  margin-bottom: 8px;
}
.even-rules-cristmas ul{
  list-style: disc;
}
.even-rules-cristmas ul li{
  margin-bottom: 4px;
}
.even-rules-cristmas *{
  color: #560B19!important;
}
.christmas-email{
  padding: 16px;
    min-width: 33%;
    border: 0px;
    font-size: 16px;
    /* border-radius: 10px; */
    color: black;
    /* background: linear-gradient(to bottom right, #118253, #332C00); */
    border: 1px solid #c3c3c3;
    font-weight: 500;
}
.christmas-email::placeholder {
  color: #c3c3c3;
  opacity: 1; /* ensures full white */
}
.christmas-email-submit{
  padding: 16px;
    font-size: 16px;
    border-radius: 0px;
    color: white;
    background: #EA543F;
    border: 1px solid #EA543F;
    font-weight: 500;
    margin-left: -16px;
    cursor: pointer;
}
.prize-bottom-area{
  padding: 8px 16px;
  background: linear-gradient(180deg, #F2B078 0%, #A65D38 100%);
  font-size: 14px;
  font-weight: 500;
  color: white;
  text-shadow: 0px 0px 0 #A65E3C;
  border-radius: 0px 0px 15px 15px;
  height: 36px;
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.questions-all{
  max-width: 700px;
}
#qText{
  text-align: left;
  display: flex;
  background: white;
  padding: 32px;
  align-items: center;
  column-gap: 20px;
  border-radius: 30px;
  font-size: 24px;
  box-shadow: 0px 4px 30px 10px rgba(255, 255, 255, 0.65);
  margin-top: -30px;
    z-index: 4;
    position: relative;
}
.ques-number{
  font-size: 48px;
  margin-right: 20px;
  color: #922735;
  font-weight: 700;
}
div#qOptions button {
    width: calc(50% - 10px);
}
#qOptions{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
#qOptions button{
  text-align: left;
  display: flex;
  background: white;
  padding: 16px;
  align-items: center;
  column-gap: 12px;
  border-radius: 25px;
  font-size: 18px;
  box-shadow: 0px 4px 20px 5px rgba(255, 255, 255, 0.65);
  font-weight: 500;
}
#qOptions button:hover, #qOptions button:hover:focus, #qOptions button:active, #qOptions button.selected-2{
  background: linear-gradient(to right, #FFFFFF, #F3BE38);
}
.ques-seq{
  font-size: 28px;
  margin-right: 10px;
  font-weight: 700;
  color: #922735;
}
.cq-screen{
  padding: 5%;
  padding-bottom: 2%;
  padding-top: 2%;
}
.game-shows{
  color: white;
  display: flex;
  font-size: 18px;
  font-weight: 600;
}
.game-quiz{
  background-color: #EA543F;
    padding: 10px 20px;
    padding-bottom: 40px;
    border-radius: 30px;
    z-index: 3;
}
.cq-progress{
  background-color: #A82B19;
    padding: 10px 20px;
    padding-bottom: 40px;
    border-radius: 30px;
    padding-left: 50px;
    margin-left: -30px;
    z-index: 2;
}
.reward-area{
  max-width: 200px;
    margin: auto;
    margin-top: 24px;
}
#rewardImage{
  margin-bottom: -4px;
}
.rewardImage img{
  width: 100%;
  display: block;
  
}
.reward-coupon{
  padding: 16px
}
.reward-copy{
  padding-left: 16px;
    padding-right: 16px;
    margin-left: -12px;
}
.christmas-cta{
  margin-top: 24px;
  background: linear-gradient(to right, #FFFFFF, #F3BE38);
  padding: 12px 24px;
  border-radius: 50px;
  color: #922735;
  font-weight: 600;
  font-size: 18px;
  display: inline-block;
  text-decoration: none;
}
/* #quizPopup{
  position: relative;
} */
.cobra-close{
  position: absolute;
  top: 40px;
  right: 40px;
  cursor: pointer;
}
.award-shipping-text{
  font-size: 14px;
  color: #922735;
  margin-top: 20px;
}
.email-box-new{
  margin-top: 20px;
}
</style>
    <div id="quizPopup" class="cq-popup hidden">
      <div class="cobra-close" onclick="closeQuiz()">
        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M30 55C43.8075 55 55 43.8075 55 30C55 16.1925 43.8075 5 30 5C16.1925 5 5 16.1925 5 30C5 43.8075 16.1925 55 30 55ZM40.165 19.835C40.5161 20.1866 40.7133 20.6631 40.7133 21.16C40.7133 21.6569 40.5161 22.1334 40.165 22.485L32.65 30L40.1625 37.5125C40.4937 37.8679 40.674 38.3381 40.6654 38.8238C40.6569 39.3096 40.4601 39.773 40.1166 40.1166C39.773 40.4601 39.3096 40.6569 38.8238 40.6654C38.3381 40.674 37.8679 40.4937 37.5125 40.1625L30 32.655L22.4875 40.1675C22.3158 40.3517 22.1088 40.4995 21.8788 40.602C21.6488 40.7044 21.4006 40.7595 21.1488 40.764C20.897 40.7684 20.647 40.7221 20.4135 40.6278C20.18 40.5335 19.968 40.3931 19.7899 40.2151C19.6119 40.037 19.4715 39.825 19.3772 39.5915C19.2829 39.358 19.2366 39.108 19.241 38.8562C19.2455 38.6044 19.3006 38.3562 19.403 38.1262C19.5055 37.8962 19.6533 37.6892 19.8375 37.5175L27.345 30L19.835 22.4875C19.6508 22.3158 19.503 22.1088 19.4005 21.8788C19.2981 21.6488 19.243 21.4006 19.2385 21.1488C19.2341 20.897 19.2804 20.647 19.3747 20.4135C19.469 20.18 19.6094 19.968 19.7874 19.7899C19.9655 19.6119 20.1775 19.4715 20.411 19.3772C20.6445 19.2829 20.8945 19.2366 21.1463 19.241C21.3981 19.2455 21.6463 19.3006 21.8763 19.403C22.1063 19.5055 22.3133 19.6533 22.485 19.8375L30 27.345L37.5125 19.8325C37.8641 19.4814 38.3406 19.2841 38.8375 19.2841C39.3344 19.2841 39.8109 19.4814 40.1625 19.8325" fill="#CDCDCD"/>
        </svg>          
      </div>
        <!-- Email Screen -->
        <div class="cq-screen hidden" id="emailScreen" style="background-image: url(https://www.rapiddirect.com/wp-content/uploads/2025/12/cristmas-1-scaled.jpg); background-size: cover;background-position: center;">
          <h2 class="text-white">Christmas Quiz Challenge Precision-Unlocked Rewards</h2>
      
          <div class="text-white">Complete our exclusive quiz to receive a guaranteed reward, plus a chance to win an annual surprise gift. Intelligence drives precise return</div>
          <div class="even-rules-cristmas">
            <h4>Event Rules</h4>
            <ul>
              <li>How to Participate: Log in or enter your email → Complete 5 multiple-choice questions</li>
              <li>Rewards: Every participant receives a guaranteed reward (Physical gifts will be mailed.)</li>
              <li>Limit: One entry per email/account</li>
              <li>Validity: Rewards are valid for 30 days after being issued</li>
              <li>Notes: Discounts cannot be combined</li>
              <li>Event Period: Dec 11, 2025 — Dec 29, 2025</li>
            </ul>
          </div>
          <!-- <input type="email" id="userEmail" class="christmas-email" placeholder="Enter your email address to start the challenge." />
          <button onclick="startQuiz()" class="christmas-email-submit">Submit</button> -->
          <div class="">
            <a href="#" onclick="startQuiz()" class="christmas-cta">Start The Quiz</a>
          </div>
      
          <div class="cq-prize-strip">
            <div>
              <img src="https://www.rapiddirect.com/wp-content/uploads/2025/12/award-1.png">
              <div class="prize-bottom-area">
                Stainless Steel <br>Insulated Tumbler
              </div>
            </div>
            <div>
              <img src="https://www.rapiddirect.com/wp-content/uploads/2025/12/award-2.png">
              <div class="prize-bottom-area">
                Notebook
              </div>
            </div>
            <div>
              <img src="https://www.rapiddirect.com/wp-content/uploads/2025/12/award-3.png">
              <div class="prize-bottom-area">
                15% Off Coupon<br>(Up to $500)
              </div>
            </div>
            <div>
              <img src="https://www.rapiddirect.com/wp-content/uploads/2025/12/award-4.png">
              <div class="prize-bottom-area">
                Free Shipping<br>(Up to $200)
              </div>
            </div>
          </div>
        </div>
        <!-- Quiz Screen -->
        <div class="cq-screen hidden" id="quizScreen" style="background-image: url(https://www.rapiddirect.com/wp-content/uploads/2025/12/christmas-2-scaled.jpg); background-size: cover;background-position: center;">
          <div class="questions-all">
            <div class="game-shows">
              <div class="game-quiz">Game Quiz</div>
              <div class="cq-progress"><span id="qTracker">1/5</span></div>
            </div>
            <h3 id="qText">Question here</h3>
        
            <div id="qOptions"></div>
            <div id="submitQuestions" class="hidden">
              <a href="#" onclick="showResults()" class="christmas-cta">Submit Your Answers</a>
            </div>
          </div>
        </div>
        <!-- Result Screen -->
        <div class="cq-screen hidden" id="resultScreen"  style="background-image: url(https://www.rapiddirect.com/wp-content/uploads/2025/12/cristmas-3-scaled.jpg); background-size: cover;background-position: center;">
          <h2 class="text-white">Challenge Complete! Your Precision Report is Ready</h2>
      
          <div class="text-white"  id="accuracyScore-text">Accuracy Score</div>
          <h1 id="accuracyScore" class="text-white">0</h1>
      
          <div class="text-white">Your Reward</div>
          <div class="reward-area">
            <div id="rewardImage"></div>
            <div class="prize-bottom-area" id="prize-bottom-text">
              Stainless Steel <br>Insulated Tumbler
            </div>
          </div>
      
          <!-- <div class="coupon-box">
            <input type="text" value="XMAS2024" class="reward-coupon" readonly />
            <button onclick="copyCode()" class="reward-copy">COPY</button>
          </div> -->
          <div class="email-box-new" id="email-box-new">
            <input type="email" id="userEmail" class="christmas-email" placeholder="Enter your email address to claim your reward" />
          <button onclick="claimReward()" class="christmas-email-submit">Claim Now</button>
          </div>
          <!-- <a href="https://app.rapiddirect.com/" class="christmas-cta">Contact RapidDirect</a>
          <div class="award-shipping-text">This reward will be shipped to you. <br>Please copy the code below and contact RapidDirect Support to claim your gift.</div> -->
          <div class="" id="apiResponse-message" style="margin-top: 20px;">

          </div>
		 <div class="hidden" id="already-claimed-award" style="margin-top: 20px;">
			 <p style="color:#fff;">
				You have already claimed your reward.
			 </p>
          </div>
        </div>
      </div>
      
      <button onclick="openQuiz()" class="open-btn">Start Christmas Quiz</button>      
<script>
    // Questions
const quizQuestions = [
  {
    q: "<div class='ques-number'>Q1. </div><div>What manufacturing services does RapidDirect offer?</div>",
    options: ["Food delivery services", "CNC machining, 3D printing, injection molding and 16 types of precision manufacturing services ", "Real estate service", "Furniture production"],
    correct: 1
  },
  {
    q: "<div class='ques-number'>Q2. </div><div>How fast can RapidDirect deliver?</div>",
    options: ["Prototypes ship in 3-5 days, injection molding in 2-4 weeks—depending on part complexity and quantity", "All orders take more than 8 weeks", "Minimum lead time is 1 month", "Next-day delivery only"],
    correct: 0
  },
  {
    q: "<div class='ques-number'>Q3. </div><div>What surface finishing services does RapidDirect provide?</div>",
    options: ["Hand-drawn patterns", "Anodizing, electroplating, sandblasting, polishing, painting, and other common finishes", "Nail polish coloring", "Wood waxing"],
    correct: 1
  },
  {
    q: "<div class='ques-number'>Q4. </div><div>What are RapidDirect's main service advantages?</div>",
    options: ["Instant quoting, strict quality control, dedicated engineers, and fast lead times", "No quality reports", "Offline communication only", "Large-volume orders only"],
    correct: 0
  },
  {
    q: "<div class='ques-number'>Q5. </div><div>What does RapidDirect's NPI service do?</div>",
    options: ["Accelerates new product development from 0-1—covering prototyping, trial runs, mass production, with full-process quality assurance and fast, stable delivery", "Packaging design only", "Warehousing only", "Retail services only"],
    correct: 0
  }
];

// Prize logic
const prizes = [
  { score: 100, img: "https://www.rapiddirect.com/wp-content/uploads/2025/12/award-1.png", text: "Thermal Bottle", code: "RoT-x9F7-42ok", probability: 1, quantity: 2, form_type:"营销订阅", form_name:"2025年圣诞节礼物 - 不锈钢水杯" },
  { score: 80,  img: "https://www.rapiddirect.com/wp-content/uploads/2025/12/award-2.png", text: "Notebook", code: "RON8-730-P9Lx", probability: 1, quantity: 2, form_type:"营销订阅", form_name:"2025年圣诞节礼物 - 笔记本" },
  { score: 60,  img: "https://www.rapiddirect.com/wp-content/uploads/2025/12/award-3.png", text: "15% OFF Coupon（Up to $500）", code: "RD15-X9F7Q2LM", probability: 39, quantity: 30 },
  { score: 40,  img: "https://www.rapiddirect.com/wp-content/uploads/2025/12/award-4.png", text: "Free Shipping (Up to $200)", code: "RDSHIP-Q6TM9F2L", probability: 59, quantity: 30 }
];

let currentQ = 0;
let correctCount = 0;
let selectedPrize = null;
let alreadyClaimed = false;


function getSavedPrize() {
  const stored = localStorage.getItem("cq_selectedPrize-2-3");
  return stored ? JSON.parse(stored) : null;
}

function ifAlreadyClaimed() {
  const stored = localStorage.getItem("cq_selectedPrize-2_claimed-3");
//console.log(stored, 'AlreadyClaimed AlreadyClaimed AlreadyClaimed AlreadyClaimed AlreadyClaimed AlreadyClaimed AlreadyClaimed AlreadyClaimed AlreadyClaimed')
	return stored;
}

// Open popup
function openQuiz() {
  selectedPrize = getSavedPrize();
  alreadyClaimed = ifAlreadyClaimed();
	
	if(alreadyClaimed){
		document.getElementById("email-box-new").classList.add("hidden");
		document.getElementById("already-claimed-award").classList.remove("hidden");
		document.getElementById("accuracyScore").classList.add("hidden");
		document.getElementById("accuracyScore-text").classList.add("hidden");
	}
//   selectedPrize = prizes[0];
  // debugger;
  document.getElementById("quizPopup").classList.remove("hidden");
  if(selectedPrize){
    showResults();
    return;
  }
  document.getElementById("emailScreen").classList.remove("hidden");
}
function closeQuiz() {
  document.getElementById("quizPopup").classList.add("hidden");
}

// Start quiz
function startQuiz() {
  // const email = document.getElementById("userEmail").value.trim();
  // if (!email) return alert("Enter email!");

  // if (!isValidEmail(email)) {
  //   alert("Please enter a valid email address");
  //   return;
  // }

  document.getElementById("emailScreen").classList.add("hidden");
  document.getElementById("quizScreen").classList.remove("hidden");

  loadQuestion();
}

function isValidEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}
// startQuiz();

// Load question
function loadQuestion() {
  const q = quizQuestions[currentQ];
  document.getElementById("qText").innerHTML = q.q;
  document.getElementById("qTracker").innerHTML = `${currentQ+1}/${quizQuestions.length}`;

  let html = "";
  q.options.forEach((op, idx) => {
    html += `<button onclick="selectOption(${idx}, this)"><div class="ques-seq">${String.fromCharCode(65+idx)}</div><div> ${op}</div></button>`;
  });
  document.getElementById("qOptions").innerHTML = html;
}

// Answer selection
function selectOption(idx, el) {
  document
    .querySelectorAll("#options-container button")  // adapt container ID
    .forEach(btn => btn.classList.remove("selected-2"));

  // Add class to clicked button
  el.classList.add("selected-2");
  if (idx === quizQuestions[currentQ].correct) correctCount++;

  currentQ++;
  if (currentQ >= quizQuestions.length) {
    showSubmitQuestionButton()
    // showResults();
  } else {
    loadQuestion();
  }
}

function showSubmitQuestionButton(){
  document.getElementById("submitQuestions").classList.remove("hidden");
}

function getRandomPrize() {
  // 1. Filter prizes with quantity > 0
  const availablePrizes = prizes.filter(p => p.quantity > 0);

  if (availablePrizes.length === 0) {
    return null; // no prizes left
  }

  // 2. Calculate total probability weight
  const totalWeight = availablePrizes.reduce((sum, p) => sum + p.probability, 0);

  // 3. Random number in range
  let random = Math.random() * totalWeight;

  // 4. Pick prize by probability
  for (const prize of availablePrizes) {
    if (random < prize.probability) {
      // reduce quantity
      prize.quantity--;
      return prize;
    }
    random -= prize.probability;
  }

  return null;
}
// Show results + prize
function showResults() {
  selectedPrize = getSavedPrize();
//   selectedPrize = prizes[1];
  document.getElementById("quizScreen").classList.add("hidden");
  document.getElementById("resultScreen").classList.remove("hidden");

  let accuracy = Math.round((correctCount / quizQuestions.length) * 100);
  document.getElementById("accuracyScore").innerText = accuracy;
	if(!selectedPrize){
	  selectedPrize = getRandomPrize();
	  savePrizeToLocalStorage(selectedPrize);
	}
  // Pick prize based on accuracy
  // let prize = prizes.find(p => accuracy >= p.score) || prizes[prizes.length - 1];
	
  document.getElementById("rewardImage").innerHTML =
    `<img src="${selectedPrize.img}" style="width:200px;">`;
    document.getElementById("prize-bottom-text").innerHTML = selectedPrize.text;
}

function savePrizeToLocalStorage(prize) {
  localStorage.setItem("cq_selectedPrize-2-3", JSON.stringify(prize));
}
function saveClaimed() {
  localStorage.setItem("cq_selectedPrize-2_claimed-3", true);
}
function getClaimed() {
  const claimed = localStorage.getItem("cq_selectedPrize-2_claimed-3");
  return claimed ? JSON.parse(claimed) : null;
}
// Copy discount code
function copyCode() {
  navigator.clipboard.writeText("XMAS2024");
  alert("Copied!");
}

	
 function testDataFunction(){
	 selectedPrize = prizes[0]
	 const data2 = {
		form_name: selectedPrize.text || 'Form Title Not Found',
		visit_path: JSON.parse(sessionStorage.getItem('userPageJourney')) || [],
		page_url: window.location.href,
		form_type: selectedPrize.form_type,
		form_name_chn: selectedPrize.form_name, 
		name: 'No Name',
		email: 'er.mayankrajput95@gmail.com'
	}
	 try {
		 res =  fetch('https://app.rapiddirect.com/api/68186d5d7362d', {
			 method: 'POST',
			 headers: {
				 'Content-Type': 'application/json'
			 },
			 body: JSON.stringify(data2)
		 })
		 // 			const result = await res.json();
	 } catch (err) {
		 console.error("Post API Error:", err);
		 return null;
	 }
	 
	 selectedPrize = prizes[1]
	 const data3 = {
		form_name: selectedPrize.text || 'Form Title Not Found',
		visit_path: JSON.parse(sessionStorage.getItem('userPageJourney')) || [],
		page_url: window.location.href,
		form_type: selectedPrize.form_type,
		form_name_chn: selectedPrize.form_name, 
		name: 'No Name',
		email: 'er.mayankrajput95@gmail.com'
	}
	 try {
		 res = fetch('https://app.rapiddirect.com/api/68186d5d7362d', {
			 method: 'POST',
			 headers: {
				 'Content-Type': 'application/json'
			 },
			 body: JSON.stringify(data3)
		 })
		 // 			const result = await res.json();
	 } catch (err) {
		 console.error("Post API Error:", err);
		 return null;
	 }
	 console.log('its working _____----------_________ its working')
 }
// 	testDataFunction();
apiCalled = false;
async function claimReward() {
	if(apiCalled){
		return;
	}
	apiCalled = true;
  const prize = selectedPrize;
  const messageBox = document.getElementById("apiResponse-message");
  messageBox.innerHTML = ""; // clear old messages
  const userEmail = document.getElementById("userEmail").value.trim();
  if (!userEmail) return alert("Enter email!");
  if (!isValidEmail(userEmail)) {
    alert("Please enter a valid email address");
    return;
  }
// 	selectedPrize = prizes[0];
  // Check if prize is physical item
  const isPhysical = (selectedPrize === prizes[0] || selectedPrize === prizes[1]);

  // If physical prize → no API call, show message
  // 
  	const data = {
		form_name: selectedPrize.text || 'Form Title Not Found',
		visit_path: JSON.parse(sessionStorage.getItem('userPageJourney')) || [],
		page_url: window.location.href,
		form_type: selectedPrize.form_type,
		form_name_chn: selectedPrize.form_name, 
		name: 'No Name',
		email: userEmail
	}
 	async function sendPhysicalAward(){
		try {
			 res = await fetch('https://app.rapiddirect.com/api/68186d5d7362d', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify(data)
			})
// 			const result = await res.json();
		} catch (err) {
			console.error("Post API Error:", err);
			return null;
		}
		if (res) {
      // SUCCESS UI message
      messageBox.innerHTML = `
        <p style="color:#fff;">
         Got it! Our support team <br>will contact you 
            within <strong>8 hours</strong> to arrange shipping.
        </p>
      `;
		saveClaimed();
	}
			}

	if(isPhysical){
			sendPhysicalAward();
			return;
			}
	async function getHashedEmail(email) {
		try {
			const res = await fetch('/wp-json/rapiddirect/v1/get-email-hash/', {
				method: "POST",
				headers: { "Content-Type": "application/json" },
				body: JSON.stringify({ email })
			});

			const data = await res.json();

			if (data.status === "success") {
				return data.field; // hashed value
			} else {
				console.warn("Email not hashed:", data);
				return null;
			}
		} catch (err) {
			console.error("Hash API Error:", err);
			return null;
		}
	}

  // Build API URL
  const apiURL = "https://api.rapiddirect.com/api/6937bc1daa5f1";
  const userEmail2 = await getHashedEmail(userEmail);
	console.log(userEmail2);
// 	'<?php //$hash = hash("sha256", 'zeauas@outlook.com');?>';
//   try {
    // Make request
    const response = await fetch(apiURL, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        user_email: userEmail2,
        coupon_code: selectedPrize.code
      })
    });

    const result = await response.json();
    console.log(result);

    // API success check (you can adjust based on real API)
    if (result.code == 1 || result.msg.toLowerCase().includes("success")) {
	console.log('sucess code 111111111111')
      // SUCCESS UI message
      messageBox.innerHTML = `
        <p style="color:#fff;">
          🎉 Congratulations! Your reward has been added to your account. Use it now.
        </p>
      `;
		saveClaimed();
    }else if (result.msg.toLowerCase().includes("already claimed")) {
			messageBox.innerHTML = `
				<p style="color:#fff;">
				This email address has been claimed. Please try a different one.
					</p>
				`;
		saveClaimed();
		}else {
      // FAILURE UI message
      console.log('failed 000000000000000000')
      messageBox.innerHTML = `
        <p style="color:#fff;">
          Sorry! Reward claim failed.<br>
          Please <a href="https://app.rapiddirect.com/member/register" target="_blank" style="color:#EA543F;text-decoration:none; font-weight: 600;background:rgba(255, 255, 255, 0.8);padding:2px;">
            [create a RapidDirect account]</a> first, <br>then try claiming your reward again.
        </p>
      `;
    }

//   } catch (error) {
//     // Network or unexpected error
//     console.error("API error:", error);

//     messageBox.innerHTML = `
//       <p style="color:#fff;">
//         Sorry! Reward claim failed.<br>
//         Please <a href="https://app.rapiddirect.com/member/register" target="_blank" style="color:#EA543F;text-decoration:none; font-weight: 600;background:rgba(255, 255, 255, 0.8);padding:2px;">
//           [create a RapidDirect account]
//         </a> first, <br>then try claiming your reward again.
//       </p>
//     `;
//   }
}


</script>
<?php get_footer();?>