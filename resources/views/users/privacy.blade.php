@extends('layout.users.index')
@section('title')
    Privacy Policy
@endsection
@section('css')
   <style class="css">
    main{
        padding:0;
    }
   
    .hero{
        display:flex;
        flex-direction:column;
        align-items:center;
        text-align: center;
        gap:10px;
        background:var(--primary-darker);
        width:100%;
        background: linear-gradient(to bottom,var(--bg),var(--primary-darker));
        padding:20px;
    }
    .title{
        font-size:2rem;
        background: linear-gradient(to right,hsl(calc(var(--secondary-hsl) + 30),100%,50%),var(--secondary));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .body{
        display:flex;
        flex-direction: column;
        gap:10px;
    }

    @media(min-width:800px){
        .body,.hero{
            padding-left:5vw;
            padding-right: 5vw;
        }
    }
    
   </style>
@endsection
@section('main')
 <section class="w-full column g-10">
  <section class="hero">
       
           
            <strong class="title font-weight-900">
                Privacy Policy
            </strong>
            <p class="opacity-07">
Effective: July 2026 | Version 1.0
            </p>
          <span>
            This Privacy Policy explains how we collect, use, and protect your information when you use our platform 

            </span>
       
    </section>

    <!-- Main Privacy Policy Content -->
    <section class="body p-20">
      




<strong class="font-weight-800 font-size-1">1. INFORMATION WE COLLECT</strong>

<div class="column g-5 w-full">
    <strong>a. Personal Information You Provide</strong>
<span>
    
- Full name, email address, phone number, country (for account registration and KYC). 
- Payment details: bank account, mobile money. 
- Referral data: information about referred users to manage <strong>Agent Rewards</strong> program. 

</span>

</div>
<div class="w-full column g-5">
    <strong>b. Automatically Collected Data</strong>
<span>
    
- Usage activity: tasks completed, <strong>Google to Earn</strong> interactions, dashboard clicks, earnings progress. 
- Device and browser: IP address, operating system, browser type, unique device identifiers. 
- Cookies and similar tracking (to improve <strong>Interactive Dashboard</strong> experience). 

</span>

</div>
<div class="w-full column g-5">
    <strong>c. Information from Third Parties</strong>
<span>
    
- Social media platforms when you use <strong>Free Social Media Boosting</strong> (e.g., public profile data, engagement stats). 
- Payment gateways and identity verification services to facilitate <strong>Weekly Salary and Agent Payouts</strong>. 

</span>

</div>

<strong class="font-size-1 font-weight-900">2. HOW WE USE YOUR INFORMATION (FEATURE-BASED)</strong>

<div class="column w-full g-5">
<strong>Earning and Financial Features: </strong>
<span>
 Your data helps us track <strong>Daily Activities</strong>, process <strong>Google to Earn</strong> tasks, complete <strong>Gift Card Trading</strong>, and disburse <strong>Instant Payouts and Weekly Salary</strong>. For <strong>Agent Rewards</strong>, we analyze referral relationships to calculate commissions. 

</span>
</div>

<div class="column w-full g-5">
<strong>Loans and Financial Assistance:</strong>
<span>
 When you request the <strong>Earnify Free Loan Feature (500,000 Naira interest-free)</strong>, we verify your identity, platform tenure, and activity level to approve the loan. Repayment reminders and status are shown on dashboard. 

</span>
</div>

<div class="column g-5">
<strong>Education and Skill Acquisition:</strong> 
<span>
We use your data to enroll you in <strong>Free Computer Training</strong> (track progress) and evaluate eligibility for <strong>Free Scholarship</strong> opportunities based on engagement or merit. 

</span>
</div>

<div class="column w-full g-5">
   <strong>Digital Growth and Empowerment:</strong>
   <span>
 For <strong>Free Social Media Boosting</strong>, we may securely connect to social networks to provide likes, followers, or views after your consent. Youth empowerment analytics help us improve community programs. 

    </span> 
</div>

<div class="column g-5 w-full">
  <strong>User Experience and Support:</strong>
<span>
 Your interaction patterns personalize the <strong>Interactive Dashboard</strong>. <strong>24/7 Weekly Support</strong> requests are stored to resolve tickets quickly. 

</span>
</div>


<div class="column w-full g-5">
<strong>SPECIAL FEATURE HIGHLIGHT: 500,000 NAIRA INTEREST-FREE LOAN</strong>
<span>
    
As a token of appreciation, qualified members receive an <strong>instant interest-free loan of 500,000 Naira</strong>. 
<strong>Privacy note:</strong> To process this loan, we collect income/transaction history and ID verification. 
No third-party credit bureaus are involved without your explicit consent. Loan data is encrypted and never sold.

</span>
</div>




<strong class="font-weight-900 font-size-1">3. SHARING AND DISCLOSURE OF INFORMATION</strong>
<div class="column w-full g-5">
    <span>
        We <strong>do not sell</strong> your personal data. Limited sharing occurs only in these contexts:
<br>
- <strong>Service providers and partners:</strong> Payment processors (payouts, gift card settlement), cloud storage, loan verification services, social media API providers (for boosting tasks). 
<br>
- <strong>Google services:</strong> For the <strong>Google to Earn</strong> feature, we may share aggregated or pseudonymous activity with Google Ads / Analytics under strict data processing terms. 
<br>
- <strong>Legal obligations:</strong> If required by law, court order, or regulatory authority in Nigeria or other jurisdictions. 
<br>
- <strong>Business transfers:</strong> Merger, acquisition, or asset sale — your data will be transferred with same privacy commitments. 
<br>
- <strong>With your explicit consent:</strong> For additional empowerment collaborations. 


    </span>
</div>


<strong class="font-weight-900 font-size-1">4. DATA SECURITY AND RETENTION</strong>

<span>
    We implement <strong>strong safeguards</strong>: end-to-end encryption for financial transactions, role-based access, regular vulnerability scans. 
Your data is stored on secure servers with firewalls. 
<strong>Retention policy:</strong> We keep your information as long as your account is active or as needed to provide services 
(e.g., loan records retained for <strong>5 years</strong> due to financial compliance; earnings history for <strong>3 years</strong>). 
You may request deletion, but residual data may be kept for fraud prevention or legal reasons.


</span>


<strong class="font-size-1 font-weight-900">5. YOUR RIGHTS AND CHOICES</strong>

<span>
Depending on your location (e.g., Nigeria Data Protection Act, GDPR where applicable), you have the right to:

- <strong>Access</strong> and receive a copy of your personal data. 
<br>
- <strong>Rectify</strong> inaccurate or incomplete information. 
<br>
- <strong>Request deletion</strong> of your account and associated data (subject to legal holds). 
<br>
- <strong>Opt-out</strong> of marketing communications via "unsubscribe" link or dashboard settings. 
<br>
- <strong>Withdraw consent</strong> for <strong>Google to Earn</strong> or <strong>Social Media Boosting</strong> at any time. 
<br>
- <strong>Lodge a complaint</strong> with the relevant data protection authority. 
To exercise your rights, contact our <strong>Privacy Desk</strong> at <strong>privacy@earnify.com</strong> or through live <strong>24/7 support chat</strong>.

</span>




<strong class="font-size-1 font-weight-900">6. FEATURE-SPECIFIC PRIVACY NOTES</strong>

<span>
    <strong>Google to Earn:</strong> Completing search or traffic tasks may involve redirection through partner links. We collect <strong>anonymized performance metrics</strong> to ensure fair rewards. We do <strong>not</strong> store your Google account passwords. 
<br><br>
 <strong>Gift Card Trading:</strong> To facilitate peer-to-peer trading, we temporarily hold gift card codes with <strong>escrow protection</strong>. All trading data is encrypted and deleted after transaction finalization. 
<br><br>
 <strong>Agent Rewards / Referrals:</strong> We track referred users via unique links. We do <strong>not</strong> expose your personal contact to your referrals unless you choose to share. 
<br><br>
 <strong>Free Computer Training and Scholarship:</strong> Course progress and quiz results are used to award certificates and improve curriculum. Never shared with external employers without permission. 
<br><br>
 <strong>Free Social Media Boosting:</strong> You will be asked to grant <strong>limited permission</strong> (e.g., public profile, followers count) to our automation tools. You may revoke access anytime from connected apps. 

</span>


<strong class="font-size-1 font-weight-900">7. CHILDREN'S PRIVACY AND AGE RESTRICTION</strong>

<span>
    Our platform is strictly for users <strong>aged 18 years and older</strong>. We do not knowingly collect data from minors. 
If we become aware that a user under 18 has registered, we will terminate the account and delete personal data immediately.

</span>



<strong class="font-size-1 font-weight-900">8. INTERNATIONAL DATA TRANSFERS</strong>

<span>
    Earnify operates globally. Your information may be transferred to and processed in countries with different data protection laws. 
When we transfer data internationally, we rely on <strong>standard contractual clauses</strong> or adequacy decisions to safeguard your privacy.

</span>



<strong class="font-size-1 font-weight-900">9. COOKIES AND TRACKING TECHNOLOGIES</strong>

<span>
    We use <strong>essential cookies</strong> to enable dashboard login, session persistence, and payout preferences. 
Optional analytics cookies (for feature improvement) can be disabled in your browser settings. 
Third-party cookies from social media boost services are managed via their own policies.

</span>


<strong class="font-size-1 font-weight-900">10. UPDATES TO THIS PRIVACY POLICY</strong>

<span>
We may revise this Privacy Policy from time to time. If changes are significant, we will notify you via <strong>email or prominent notice on your dashboard</strong>. 
The revised policy will become effective <strong>7 days after posting</strong>. Your continued use of Earnify features constitutes acceptance.


</span>




       
    </section>

 </section>
@endsection
@section('js')
  
@endsection