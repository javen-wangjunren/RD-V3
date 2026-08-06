<?php
	function display_halloween($atts, $content = null) { 
		$a = shortcode_atts( array(
			'width' => '48',
		), $atts );
		ob_start();
			?>
			<style>
				.haloween-click{
					width: <?= get_field('image_width_halo_04', 'options');?>px;
					position: fixed;
					left: 20px;
					bottom: 20px;
					z-index: 999;
				}
				.d-inline{
					display: inline;
				}
				.haloween-close{
					width: 20px;
					display: inline-block;
					height: 20px;
					line-height: 20px;
					text-align: center;
					cursor: pointer;
					position: absolute;
					top: -24px;
					right: -24px;
				}
			</style>
			<?php if(get_field('is_live_halo_04', 'options')){ ?>
			<div class="haloween-click" id="show-haloween-click-bat" style="display:none">
				<span class="haloween-close" onclick="closeHalloweenBat()">x</span>
				<img class="" src="/wp-content/uploads/2025/10/img2.png" onclick="openSpinPopup()" alt="image haloowen-click">
			</div>
			<?php } ?>
			<div id="rd-spin-popup" class="rd-spin-popup">
				<div class="rd-spin-popup__overlay"></div>
				<div class="rd-spin-popup__content">
					<button class="rd-popup-close" id="rd-popup-close" aria-label="Close popup">✕</button>
					<section class="rapiddirect-spin elementor-column" id="rd-spin-inline">
						<style>
							/* Popup container */
							.rd-spin-popup {
								position: fixed;
								inset: 0;
								display: none; /* Hidden by default */
								align-items: center;
								justify-content: center;
								z-index: 999999;
								font-family: Inter, system-ui, Arial, sans-serif;
							}

							/* Dark overlay background */
							.rd-spin-popup__overlay {
								position: absolute;
								inset: 0;
								background: rgba(0,0,0,.6);
								backdrop-filter: blur(3px);
							}

							/* Popup content area */
							.rd-spin-popup__content {
								position: relative;
								background: #fef9f3;
								border-radius: 16px;
								padding: 30px;
								max-width: 1280px;
								width: 100%;
								max-height: 95vh;
								overflow-y: auto;
								box-shadow: 0 8px 40px rgba(0,0,0,.3);
								z-index: 2;
								animation: rdPopupIn .3s ease;
							}

							/* Close button */
							.rd-popup-close {
								position: absolute;
								top: 14px;
								right: 14px;
								background: none;
								border: none;
								font-size: 24px;
								cursor: pointer;
								color: #555;
								z-index: 10;
							}

							@keyframes rdPopupIn {
								from { opacity: 0; transform: scale(0.95); }
								to   { opacity: 1; transform: scale(1); }
							}

							/* Optional: disable page scroll when popup open */
							body.rd-popup-open {
								overflow: hidden;
							}

							#rd-spin-inline {
								font-family: Inter, system-ui, Arial, sans-serif;
								--rd-accent:#ea543f; --rd-dark:#121212; --rd-muted:#A5A5A5; --rd-bg:#fff;
								display:flex; justify-content:center; align-items:center; gap:80px; flex-wrap:wrap;
								background:#FFF9F3; padding:3% 2%; border-radius:16px;

							}
							.rd-wheel-wrap { position:relative; width:420px; height:420px; }
							.rd-wheel { width:100%; height:100%; border-radius:50%; transform-origin:50% 50%; transition:transform .3s linear; }
							.rd-pointer-bar {
								position: absolute;
								right: -50px;
								top: 50%;
								transform: translateY(-50%);
								height: 40px;
								border-radius: 3px;
								z-index: 20;
							}
							.rd-controls { width:calc(100% - 570px); display:flex; flex-direction:column; gap:12px; }
							.rd-logo { width:150px; align-self:center; }
							.rd-title { font-weight:700; text-align:center; font-size:20px; }
							.rd-sub { color:var(--rd-dark); font-size:14px; font-weight: 600; padding: 2% 5%;}
							.rd-desc { color:var(--rd-muted); font-size:12px; padding-left: 5%; }
							.rd-input-wrap { display:flex; gap:8px; padding-left: 5%;}
							.rd-input { flex:1; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:14px; max-width:300px;}
							.rd-btn { padding:12px 18px; background:var(--rd-accent); color:#fff; border:none; border-radius:8px; font-weight:600; cursor:pointer; box-shadow:0 6px 18px rgba(234,11,11,.18); }
							.rd-btn:disabled { opacity:.6; cursor:not-allowed; }
							.rd-result { text-align:center; color:var(--rd-accent); font-weight:600; font-size:14px; }
							.rd-foot { text-align:center; font-size:11px; color:var(--rd-muted); }
							@media(max-width:780px){ #rd-spin-inline{flex-direction:column;} .rd-controls{width:100%; max-width:360px;} }
							#rd-confetti { position:fixed; inset:0; width:100%; height:100%; pointer-events:none; z-index:9999; }
							/* Result popup modal */
							.rd-modal-result { position:fixed; inset:0; display:none; align-items:center; justify-content:center; background:rgba(0,0,0,.45); z-index:10000; }
							.rd-modal-card { width:min(520px,94vw); background:#FFF9F3; border-radius:12px; padding:22px; box-shadow:0 12px 40px rgba(0,0,0,.3); text-align:center; }
							.rd-modal-card h3 { margin:6px 0 10px; color:var(--rd-dark); font-size:24px; color: #ea543f; }
							.rd-coupon { display:flex; gap:8px; align-items:center; justify-content:center; margin:14px 0; }
							.rd-coupon-code { padding:12px 16px; border-radius:8px; background:#f7f7f7; font-weight:800; letter-spacing:1px; font-size:18px; min-width:180px; text-align:center; }
							.rd-copy-btn { padding:10px 12px; border-radius:8px; border:none; background:var(--rd-accent); color:#fff; cursor:pointer; font-weight:700; }
							.rd-small { font-size:14px; margin-top:8px; }
							.rd-close-btn { margin-top:12px; padding:10px 14px; border-radius:8px; border:1px solid #eee; background:#fff; cursor:pointer; }
							.rd-sub ol { list-style: auto; padding-left: 24px; padding-top: 8px; }
							#rd-wheel-g{
								outline: 20px solid #EA543F;
								border-radius: 1000px;
							}
							.main-notices-for-spin{
								/* 					margin-bottom: 80px; */
								background: #FFF9F3;
								/* 					padding-bottom: 60px; */
							}
							/* 	  .main-notices-for-spin .elementor-container{
							max-width: 1280px;
							} */
							@media(min-width:780px){
								.main-notices-for-spin div{
									display: flex;
									justify-content: space-around;
								}
							}
							.main-notices-for-spin div div{
								background: #FFE2C2;
								padding: 8px 24px;
								margin-bottom: 10px;
								color: #AB4141;
								font-weight: 500;
								border-radius: 8px;
								margin-left: 10px;
								margin-right: 10px;
								text-align: center;
								font-size: 10px;
							}
						</style>

						<!-- Wheel Section -->
						<div class="rd-wheel-wrap">
							<div class="rd-pointer-bar" id="rd-pointer-bar" aria-hidden="true">
								<img src="https://www.rapiddirect.com/wp-content/uploads/2025/10/arrow.png" alt="arrow pointer" width="50px">
							</div>
							<svg id="rd-wheel-svg" class="rd-wheel" viewBox="0 0 1000 1000" role="img" aria-label="Spin wheel">
								<g id="rd-wheel-g" transform="translate(500,500)"></g>
								<circle cx="500" cy="500" r="86" fill="#fff" stroke="#f1f1f1" stroke-width="3"></circle>
								<text x="500" y="506" text-anchor="middle" font-size="36" fill="#111" font-weight="700">SPIN</text>
								<text x="500" y="536" text-anchor="middle" font-size="13" fill="#666">TO WIN</text>
							</svg>
						</div>

						<!-- Controls Section -->
						<div class="rd-controls">
							<!--     <img class="rd-logo" src="https://static.ecomsend.com/upload/custom-upload/68908613807/RHrib2Daz16a90FtFl9cbDAT6AEQuNxS8BHeAdkH.png" alt="RapidDirect logo" /> -->
							<h2 class="rd-title">🎃 Spin the Wheel — Win Up to 20% OFF!</h2>
							<div class="rd-sub">This Halloween, RapidDirect turns your ideas into high-quality custom parts — fast, precise, and delivered globally.<br>
								How to play:
								<ol>
									<li>Submit your email below.</li>
									<li>Click GO To  Claim Your Exclusive Offer </li>
									<li>Use this code at checkout for instant savings, or contact us for a free NPI evaluation.</li>
								</ol>
							</div>
							<div class="rd-desc">Note: Limited quantities available - first come, first serve </div>
							<div class="rd-input-wrap" id="rd-input-form" role="form" aria-label="Enter email to spin">
								<input id="rd-email" class="rd-input" type="email" placeholder="Email address" autocomplete="email" aria-label="Email address">
								<button id="rd-spin-btn" class="rd-btn" aria-label="Spin the wheel">SPIN</button>
							</div>
							<div class="rd-result" id="rd-prev-result" aria-live="polite"></div>
							<div id="rd-coupon-code-2" class="rd-coupon-code" aria-live="polite"></div>
							<!--     <div class="rd-foot">All prizes subject to RapidDirect terms. Cannot be combined with other discounts.</div> -->
						</div>

						<!-- Confetti Canvas -->
						<canvas id="rd-confetti" aria-hidden="true"></canvas>

						<!-- Result Modal (shows coupon code / instructions) -->
						<div class="rd-modal-result" id="rd-modal-result" role="dialog" aria-modal="true" aria-labelledby="rd-modal-heading">
							<div class="rd-modal-card" role="document">
								<h3 id="rd-modal-heading">Nice one!</h3>
								<p id="rd-modal-sub" class="rd-small">You won a prize. Use the coupon code below when placing your order or send it to customer service to redeem.</p>

								<div class="rd-coupon">
									<div id="rd-coupon-code" class="rd-coupon-code" aria-live="polite">--</div>
									<button id="rd-copy-btn" class="rd-copy-btn" aria-label="Copy coupon code">Copy</button>
								</div>

								<div id="rd-modal-extra" class="rd-small"></div>

								<button id="rd-modal-close" class="rd-close-btn" aria-label="Close popup">Close</button>
							</div>
						</div>

						<script>
							(function(){
								/* CONFIG */
								const PRIZE10NUM = <?= get_field('10_percent_prize', 'options');?>;
								const PRIZE15NUM = <?= get_field('15_percent_prize', 'options');?>;
								const PRIZE200NUM = <?= get_field('free_shipping_up_to_200', 'options');?>;
								const PRIZE20NUM = <?= get_field('20_percent_prize_upto_500', 'options');?>;
								const weight1 = PRIZE10NUM <= 0 ? 0 : 15;
								const weight2 = PRIZE15NUM <= 0 ? 0 : 10;
								const weight3 = PRIZE200NUM <= 0 ? 0 : 15;
								const weight4 = PRIZE200NUM <= 0 ? 0 : 5;
								console.log(weight1, weight2, weight3);
								const PRIZES = [
									{ id:'HalloweenMQ10J9W8R', label:'10% OFF (up to $200)', color:'#fbe7d7', textColor:'#EA543F', weight:weight1, remaining:PRIZE10NUM },
									{ id:'HalloweenMQ15G8Y37', label:'15% OFF (up to $300)', color:'#EA543F', textColor:'#fff', weight:weight2, remaining:PRIZE15NUM },
									{ id:'HalloweenMQ50%Shipping7Y2E', label:'50% OFF Ship ($200 Max)', color:'#fbe7d7', textColor:'#EA543F', weight:weight3,  remaining:PRIZE200NUM},
									{ id:'HalloweenMQ20RDWIN2025', label:'20% OFF (up to $500)', color:'#EA543F', textColor:'#fff', weight:weight4, remaining: PRIZE20NUM },
									{ id:'HalloweenRDNPI', label:'Free NPI Evaluation', color:'#fbe7d7', textColor:'#EA543F', weight:55, remaining: 1000000 },
									{ id:'noprice', label:'No Prize', color:'#EA543F', textColor:'#fff', weight:0, remaining: 1000000 },
								];
								const SPIN_DURATION = 4200, FULL_ROTATIONS = 6;
								const BACKEND_API_ENDPOINT = ''; // OPTIONAL: set to server endpoint to record email & issue server coupon

								/* ELEMENTS */
								const wheelG = document.getElementById('rd-wheel-g');
								const svg = document.getElementById('rd-wheel-svg');
								const spinBtn = document.getElementById('rd-spin-btn');
								const emailInput = document.getElementById('rd-email');
								const prevResult = document.getElementById('rd-prev-result');
								const confettiCanvas = document.getElementById('rd-confetti');

								const modal = document.getElementById('rd-modal-result');
								const modalHeading = document.getElementById('rd-modal-heading');
								const modalSub = document.getElementById('rd-modal-sub');
								const couponCodeEl = document.getElementById('rd-coupon-code');
								const couponCodeEl2 = document.getElementById('rd-coupon-code-2');
								const copyBtn = document.getElementById('rd-copy-btn');
								const modalClose = document.getElementById('rd-modal-close');
								const STORAGE_KEY = 'rd_spin_result_inline_v31';

								const alreadySpin = JSON.parse(localStorage.getItem(STORAGE_KEY));
								const formSpin = document.getElementById('rd-input-form');
								if(alreadySpin){
									formSpin.style.display = 'none';
									couponCodeEl2.innerHTML = 'code: ' + alreadySpin.coupon;
								}else{
									couponCodeEl2.style.display = 'none';
								}
								let currentRotation = 0, isSpinning = false;

								/* DRAW WHEEL - pointer is at left (-180° baseline) */
								function drawWheel(){
									const total = PRIZES.length, arc = 360/total, r = 460;
									wheelG.innerHTML = '';
									PRIZES.forEach((p,i)=>{
										const start = -180 + i*arc;
										const x1 = Math.cos(Math.PI/180*start)*r;
										const y1 = Math.sin(Math.PI/180*start)*r;
										const x2 = Math.cos(Math.PI/180*(start+arc))*r;
										const y2 = Math.sin(Math.PI/180*(start+arc))*r;
										const path = document.createElementNS("http://www.w3.org/2000/svg","path");
										path.setAttribute('d', `M0 0 L ${x1} ${y1} A ${r} ${r} 0 0 1 ${x2} ${y2} Z`);
										path.setAttribute('fill', p.color);
										path.setAttribute('stroke', '#eee');
										path.setAttribute('stroke-width', '1');
										wheelG.appendChild(path);

										const mid = (start + start + arc) / 2;
										const lx = Math.cos(Math.PI/180*mid) * r * 0.64;
										const ly = Math.sin(Math.PI/180*mid) * r * 0.64;
										const t = document.createElementNS("http://www.w3.org/2000/svg","text");
										t.setAttribute('x', lx);
										t.setAttribute('y', ly + 6);
										t.setAttribute('fill', p.textColor || '#111');
										t.setAttribute('font-size', '24');
										t.setAttribute('font-weight', '700');
										t.setAttribute('text-anchor', 'middle');
										t.setAttribute('transform', `rotate(${mid}, ${lx}, ${ly})`);
										t.textContent = p.label;
										wheelG.appendChild(t);
									});
								}

								/* Weighted pick */
								function weightedPick(){
									const total = PRIZES.reduce((s,p)=>s+(p.weight||1),0);
									let r = Math.random()*total;
									for (let p of PRIZES){ r -= p.weight||1; if (r <= 0) return p; }
									return PRIZES[PRIZES.length-1];
								}

								/* Spin math: pointer at left (-180°) */
								function spinToPrize(prize){
									const idx = PRIZES.findIndex(p => p.id === prize.id);
									const segAngle = 360/PRIZES.length;
									const targetDeg = -180 - (idx*segAngle + segAngle/2);
									const normalized = ((targetDeg % 360)+360) % 360;
									const destination = FULL_ROTATIONS*360 + normalized;
									animateRotation(destination, prize);
								}

								function animateRotation(destination, prize){
									if (isSpinning) return;
									isSpinning = true; spinBtn.disabled = true;
									const start = performance.now(); const initial = currentRotation;
									function easeOutCubic(t){ return 1 - Math.pow(1 - t, 3); }
									function frame(now){
										const t = Math.min(1, (now - start) / SPIN_DURATION);
										const eased = easeOutCubic(t);
										currentRotation = initial + (destination - initial) * eased;
										svg.style.transform = `rotate(${currentRotation}deg)`;
										if (t < 1) requestAnimationFrame(frame);
										else { isSpinning = false; spinBtn.disabled = false; onSpinComplete(prize); }
									}
									requestAnimationFrame(frame);
								}

								/* On spin complete: generate code (placeholder) and show modal */
								function onSpinComplete(prize){
									const email = (emailInput.value || '').trim().toLowerCase();
									const payload = { email, prizeId: prize.id, prizeLabel: prize.label, date: new Date().toISOString() };

									// generate a coupon code client-side placeholder (replace with server-generated for production)
									let coupon = null;
									if (prize.id !== 'noprice') coupon = generateCoupon(prize);

									// store result
									try { localStorage.setItem(STORAGE_KEY, JSON.stringify({ ...payload, coupon })); } catch(e){}

									// optionally POST to backend to record and generate server coupon
									if (BACKEND_API_ENDPOINT) {
										fetch(BACKEND_API_ENDPOINT, { method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify({ ...payload, coupon }) })
											.then(r=>r.json()).then(res=>{
											// if backend returns official coupon code, replace local coupon
											if (res && res.coupon) { coupon = res.coupon; couponCodeEl.textContent = coupon; try { const store = JSON.parse(localStorage.getItem(STORAGE_KEY) || '{}'); store.coupon = coupon; localStorage.setItem(STORAGE_KEY, JSON.stringify(store)); } catch(e){} }
										}).catch(()=>{/*ignore*/});
									}

									// update prev result text
									prevResult.textContent = prize.id === 'noprice' ? 'No Prize 😢' : `You won ${prize.label} 🎉`;

									// show modal with coupon or no-prize message
									if (prize.id === 'noprice') {
										modalHeading.textContent = 'No Prize';
										modalSub.textContent = 'Sorry — no discount this time. Try again later!';
										couponCodeEl.textContent = '--';
										copyBtn.style.display = 'none';
										document.getElementById('rd-modal-extra').style.display = 'none';
									} else {
										modalHeading.textContent = 'Congrats!';
										modalSub.textContent = `You won ${prize.label}.`;
										couponCodeEl.textContent = coupon || '--';
										copyBtn.style.display = 'inline-block';
										document.getElementById('rd-modal-extra').style.display = 'block';
										runConfetti();
									}

									// show modal
									modal.style.display = 'flex';
									modal.focus();
									const alreadySpin = JSON.parse(localStorage.getItem(STORAGE_KEY));
									const formSpin = document.getElementById('rd-input-form');
									if(alreadySpin){
										formSpin.style.display = 'none';
										couponCodeEl2.innerHTML = 'code: ' + alreadySpin.coupon;
										couponCodeEl2.style.display = 'block';
									}else{
										couponCodeEl2.style.display = 'none';
									}
								}

								function generateCoupon(prize){
									//       const token = Math.random().toString(36).slice(2,8).toUpperCase();
									// 		const token = '7PGO7A';
									updateDbFields(prize);
									return `${prize.id}`;
								}


								function updateDbFields(prize){
									fetch('/wp-json/rapiddirect/v1/update-prize/', {
										method: 'POST',
										headers: { 'Content-Type': 'application/json' },
										body: JSON.stringify({ prize: prize.id }) // e.g. "HalloweenMQ109W8R"
									})
										.then(res => res.json())
										.then(data => console.log(data));
								}
								/* Confetti */
								function runConfetti(){
									const canvas = confettiCanvas; const ctx = canvas.getContext('2d');
									canvas.width = window.innerWidth; canvas.height = window.innerHeight;
									let pieces = []; const colors = ['#ffda77','#ff8a33','#ff6b00','#ffd6d6','#ffb3b3'];
									for (let i=0;i<90;i++) pieces.push({ x: Math.random()*canvas.width, y: -Math.random()*200, vx:(Math.random()-.5)*8, vy:Math.random()*6+2, r:4+Math.random()*6, c: colors[Math.floor(Math.random()*colors.length)], rot:Math.random()*360, vr:(Math.random()-.5)*10 });
									let then = performance.now();
									(function frame(now){
										const dt = (now - then)/16.666; then = now;
										ctx.clearRect(0,0,canvas.width,canvas.height);
										pieces.forEach(p=>{ p.vy += 0.25*dt; p.x += p.vx*dt; p.y += p.vy*dt; p.rot += p.vr*dt; ctx.save(); ctx.translate(p.x,p.y); ctx.rotate(p.rot*Math.PI/180); ctx.fillStyle=p.c; ctx.fillRect(-p.r/2,-p.r/2,p.r,p.r*1.4); ctx.restore(); });
										pieces = pieces.filter(p=>p.y < canvas.height+80);
										if (pieces.length) requestAnimationFrame(frame); else ctx.clearRect(0,0,canvas.width,canvas.height);
									})(performance.now());
								}

								/* Utils & events */
								function validEmail(v){ return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

								function onSpin(){
									if (isSpinning) return;
									const em = emailInput.value.trim();
									if (!validEmail(em)) { emailInput.style.borderColor = '#f66'; emailInput.focus(); setTimeout(()=>emailInput.style.borderColor='#ddd',1000); return; }
									sendMarketingSubscription(em);
									const prize = weightedPick();
									spinToPrize(prize);
								}

								function copyCouponToClipboard(){
									const text = couponCodeEl.textContent.trim();
									if (!text || text === '--') return;
									navigator.clipboard?.writeText(text).then(()=>{
									copyBtn.textContent = 'Copied!';
									setTimeout(()=> copyBtn.textContent = 'Copy', 1200);
								}).catch(()=>{
									// fallback
									const ta = document.createElement('textarea'); ta.value = text; document.body.appendChild(ta); ta.select();
									try { document.execCommand('copy'); copyBtn.textContent = 'Copied!'; } catch(e){ alert('Copy failed — please copy manually: ' + text); }
									ta.remove();
									setTimeout(()=> copyBtn.textContent = 'Copy', 1200);
								});
								}

									/* Events */
									spinBtn.addEventListener('click', onSpin);
									emailInput.addEventListener('keydown', e=>{ if (e.key === 'Enter') onSpin(); });
									copyBtn.addEventListener('click', copyCouponToClipboard);
									modalClose.addEventListener('click', ()=>{ modal.style.display = 'none'; });
									modal.addEventListener('click', (e)=>{ if (e.target === modal) modal.style.display = 'none'; });
									document.addEventListener('keydown', (e)=>{ if (e.key === 'Escape') modal.style.display = 'none'; });

									/* Init */
									drawWheel();
									// previous result
									try {
									const prev = JSON.parse(localStorage.getItem(STORAGE_KEY) || 'null');
									if (prev && prev.prizeLabel) prevResult.textContent = prev.prizeLabel === 'No Prize' ? 'No Prize 😢' : 'You Won: ' + prev.prizeLabel;
								} catch(e){}
								// responsive confetti canvas resize
								window.addEventListener('resize', ()=>{ confettiCanvas.width = window.innerWidth; confettiCanvas.height = window.innerHeight; });

								// expose API
								window.RDSpin = {
									getResult: ()=> { try { return JSON.parse(localStorage.getItem(STORAGE_KEY)); } catch(e){ return null; } },
									reset: ()=> { localStorage.removeItem(STORAGE_KEY); prevResult.textContent = ''; },
									setBackendEndpoint: (url)=> { window.BACKEND_API_ENDPOINT = url; }
								};
							})();
						</script>
					</section>
					<section class="main-notices-for-spin elementor-section elementor-inner-section">
						<div class="elementor-container elementor-column-gap-default">
							<div>
								Applies to all RapidDirect services.
							</div>
							<div>
								Promotion: Oct 27 – Nov 4, 2025.
							</div>
							<div>
								RapidDirect reserves final interpretation rights.
							</div>
							<div>
								Cannot be combined with other discounts on the same order.
							</div>
						</div>
					</section>

				</div>
			</div>
			<script>
				function sendMarketingSubscription(email) {
					if (!email) {
						console.error('Email is required!');
						return;
					}

					const data = {
						form_name: '2025万圣节活动',
						form_type: '营销订阅',
						visit_path: JSON.parse(sessionStorage.getItem('userPageJourney')) || [],
						page_url: window.location.href,
						form_name_chn: '2025万圣节活动',
						email: email, // only required input
					};

					console.log('Sending subscription data:', data);

					fetch('https://app.rapiddirect.com/api/68186d5d7362d', {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify(data)
					})
						.then(response => {
						if (!response.ok) throw new Error('Network response was not ok');
						return response.json();
					})
						.then(result => {
						console.log('Subscription success:', result);
					})
						.catch(error => {
						console.error('Subscription error:', error);
					});
				}
				document.getElementById('open-wheel-id').addEventListener('click', function() {
					openSpinPopup();
				});
				document.addEventListener('click', function(e) {
					console.log(e);
					if (e.target && e.target.id === 'open-wheel-id') {
						openSpinPopup();
					}
				});
				function watchForWheelButton() {
					const observer = new MutationObserver(() => {
						const btn = document.getElementById('open-wheel-id');
						if (btn) {
							// Attach your click listener
							btn.addEventListener('click', openSpinPopup);
							console.log('✅ Wheel button detected & event bound!');
							observer.disconnect(); // stop watching once it’s found
						}
					});

					// Start watching the whole document for new nodes
					observer.observe(document.body, { childList: true, subtree: true });
				}

				// 3️⃣ Run this ONCE when your page loads
				document.addEventListener('DOMContentLoaded', () => {
					watchForWheelButton();
				});
				
				function closeHalloweenBat(){
					localStorage.setItem('close-hallowen-click-bat-2', 'true');
					document.getElementById('show-haloween-click-bat').style.display = 'none';
				}
// 				document.addEventListener('DOMContentLoaded', function() {
					
// 				});
			</script>
			<script>
				console.log('------------------XXXXXXX-----------------------XXXXXXX--------------')
				const banner = document.getElementById('show-haloween-click-bat');

				// If element exists
				if (banner) {
					// Check if the variable exists and is 'true'
					// 						const isClosed = localStorage.getItem('close-hallowen-click-bat') == 'true';

					if (!localStorage.getItem('close-hallowen-click-bat-2')) {
						// If not closed before → show the element
						banner.style.display = 'block';
					} else {
						// Already closed → keep it hidden
						banner.style.display = 'none';
					}
				}
				document.addEventListener("DOMContentLoaded", () => {
					const popup = document.getElementById("rd-spin-popup");
					const closeBtn = document.getElementById("rd-popup-close");

					// Example: open popup manually
					window.openSpinPopup = function() {
						popup.style.display = "flex";
						document.body.classList.add("rd-popup-open");
					};

					// Close popup
					closeBtn.addEventListener("click", () => {
						popup.style.display = "none";
						document.body.classList.remove("rd-popup-open");
					});

					// Close when clicking overlay
					popup.querySelector(".rd-spin-popup__overlay").addEventListener("click", () => {
						popup.style.display = "none";
						document.body.classList.remove("rd-popup-open");
					});
				});
// 				openSpinPopup();
			</script>
	<?php
		return ob_get_clean();
	}
	// register shortcode
	add_shortcode('halloween', 'display_halloween');

?>