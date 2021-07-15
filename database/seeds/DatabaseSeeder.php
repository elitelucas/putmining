<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'email' => 'admin@putmining.com',
            'password' => Hash::make('123456'),
            'email_verified' => 1,
            'is_admin' => 1,
            'expiry_date' => '2021-12-31',
        ]);
        DB::table('users')->insert([
            'email' => 'unpaid@putmining.com',
            'email_verified' => 1,
        ]);
        DB::table('users')->insert([
            'email' => 'paid@putmining.com',
            'password' => Hash::make('123456'),
            'email_verified' => 1,
            'expiry_date' => '2021-12-31',
        ]);

        DB::table('settings')->insert([
            'key' => 'Alert Administrator Email',
            'value' => 'vovochkaperepelkin@yandex.ru',
        ]);
        DB::table('settings')->insert([
            'key' => 'Verification Email Subject',
            'value' => 'Email Verification',
        ]);
        DB::table('settings')->insert([
            'key' => 'Forgotpassword Email Subject',
            'value' => 'Reset Password',
        ]);
        DB::table('settings')->insert([
            'key' => 'PublicBlogUpdate Email Subject',
            'value' => 'Public Blog Updated',
        ]);
        DB::table('settings')->insert([
            'key' => 'PaidBlogUpdate Email Subject',
            'value' => 'Paid Blog Updated',
        ]);
        DB::table('settings')->insert([
            'key' => 'Paypal Client ID',
            'value' => 'AeLfBdW7OC9tPaolYdA5ZN0COAnVRzSGfdza8rGR8MQLNPf9F9oPbGsb16OI4VlAhAxhqZ_S1p21Oktg',
        ]);
        DB::table('settings')->insert([
            'key' => 'Paypal Secret Key',
            'value' => 'EB_AseyTPEnZu1O1eP-rkzAu_OauW4FIYCryIBOLRaRrxc2r6CLkUCPLQywWgMOd-dO9NHcxImbh4Lcj',
        ]);

        DB::table('contents')->insert([
            'title' => 'Active Plays',
            'type' => 'page',
            'content' => '<p>This is Active Plays page.</p>',
        ]);
        DB::table('contents')->insert([
            'title' => 'How To',
            'type' => 'page',
            'content' => '<p>This is How To page.</p>',
        ]);
        DB::table('contents')->insert([
            'title' => 'Verification Email',
            'type' => 'mail',
            'content' => '<p>Hello, you need to verify Email.</p>',
        ]);
        DB::table('contents')->insert([
            'title' => 'Forgotpassword Email',
            'type' => 'mail',
            'content' => '<p>Hello, click this button to reset password.</p>',
        ]);
        DB::table('contents')->insert([
            'title' => 'PublicBlogUpdate Email',
            'type' => 'mail',
            'content' => '<p>Hello, homepage public blog is updated.</p>',
        ]);
        DB::table('contents')->insert([
            'title' => 'PaidBlogUpdate Email',
            'type' => 'mail',
            'content' => '<p>Hello, paid blog is updated.</p>',
        ]);
        DB::table('contents')->insert([
            'title' => 'Introduction',
            'type' => 'page',
            'content' => 'What is Putmining? <br>
            To attain economic retirement (investing for income) with dividends alone, you will need millions of dollars AND a relatively high and reliable dividend percentage annual payout. For most folks, investing to build capital is a different strategy and mindset. It also takes quite a bit of time unless you have great luck, or a wealthy loved one passes away. Put Mining is designed to increase income percentage by ~10% per year without changing your current build or dividend income strategies. For example, if your current capital goal will be attained in 10 years at 5% compounded interest per year, Put Mining is designed to help you attain it in 3.5 years at 15%. We Mine through 100,000+ stock options every week aiming for weekly plays. The size recommendations of these plays are guided by up to date statistics gathered since its Jan.30, 2018 inception. A major goal of Put Mining is to constantly improve the filters and algorithms used. Using these statistics, the Put Mining aims to teach you to better understand and more effectively mitigate your risk.',
        ]);
        DB::table('contents')->insert([
            'title' => 'About Putmining',
            'type' => 'page',
            'content' => "
                -Want a Free Subscription?<br>
                All base stocks that are mined by Put Mining are picks by the brilliant Bill Spetrino. If you are an active member of Bill's BIO forum, this PutMining.com service is free to you. Simply subscribe with your preferred email address. Make your way to the Profile page, then Payments. Select the BIO option and enter your BIO userID in the field provided. So long as you remain an active member of BIO, your PutMining.com subscription will be free. If you are NOT an active member of Bill's BIO forum, consider joining with him by contacting him directly via http://www.billspetrino.com/. Once you're a BIO member, come back here and PutMining.com will be free for you. We will try, but make no promise to be 100% up to date with Bill's stock picks. For example, an option play may expire after changes that Bill makes.
                <br><br>
                - Return policy <br>
                If you are disappointed with the Put Mining service, we will only ask that we have an email or voice conversation to understand why (to help improve future service). Then, we'll give a prorated refund for time not used (only applicable to 1+ year subscriptions).
                <br><br>
                - Subscriber Etiquette <br>
                Each subscribed email is only authorized for one person's access to this site's information. If you are sharing an email address to access this site, you are violating the subscriber agreement. If you access this site's subscriber section from more than the email subscriber's own device, the account will be locked down and no refund will be offered due to violation of the subscriber agreement.
            ",
        ]);
        DB::table('contents')->insert([
            'title' => 'Disclaimer',
            'type' => 'page',
            'content' => "
            <p>
                We either own, have owned, or will own either stocks or options of all companies mentioned
                here. I have also either sold or will sell them. We are not CPAs, not licensed stock brokers, not
                licensed financial advisors, not offering to manage money. We don't necessarily hold all the
                stock, option, or other plays mentioned. We may have executed stock or option buys or sales
                mentioned on this website before they have been advertised here. We will never ask you for
                your personal (or business) brokerage account information details by voice, email, or any other
                digital means. We will never ask you for any money for trading stock or options. We have no
                way of financially benefiting from anything you do in the stock markets regardless of whether
                you choose to act on the Put Mining plays listed on this site. We are not offering to, nor will I
                ever offer or be willing to manage your money, stocks, or options plays for you. Each stock,
                option, trade, or investment decision you make is ultimately your decision on your own. Only
                you can know your entire financial situation and are therefore responsible for your own choices.
                All posted plays are picked based on the U.S. system of option trading. Please don't confuse
                this with European or other foreign terms and standards for option trading. PutMining.com only
                intends to provide general education and impersonalized information. </p>
            <p>Past performance is not necessarily indicative of future results. The results presented on this
                website are not typical. Actual results will vary widely given a variety of factors such as
                experience, skill, risk mitigation practices, market dynamics and the amount of capital deployed.
                It is easy to lose money trading, and we recommend seeking individual professional advice or
                educating yourself as much as possible before considering any investments.</p>
            <p>Put Mining is not an investment advisor or registered broker. Neither PutMining.com nor any of
                its owners or employees is registered as a securities broker-dealer, broker, an investment
                advisor, or an investment advisor representative with the U.S. Securities and Exchange
                Commission, any state securities regulatory authority, or any self-regulatory organization.</p>
            <p>This website is for educational and information purposes only. This site is not intended as
                investment advice. This website, and communication from it, are for educational and
                informational purposes only. The website and any statements made in it or from it are not, and
                should not be construed to be, personalized investment advice directed to or appropriate for any
                particular individual. The statements made in this communication should not be relied upon for
                purposes of transacting in the securities of the companies profiled in this communication, nor
                should they be construed as a recommendation to buy, sell or hold any position in any security
                of the companies profiled in this communication. We cannot and do not assess, verify or
                guarantee the suitability or profitability of any particular investment. Any subscriber or user of
                our services bears responsibility for their own investment research and decisions and should
                review all investment decisions with a licensed investment professional.</p>
            <p>Do not base any investment decision upon any materials found on this website or
                communication from within. We are not registered as a securities broker-dealer or an
                investment adviser either with the U.S. Securities and Exchange Commission (the “SEC”) or
                with any state securities regulatory authority. We are neither licensed nor qualified to provide
                investment advice.</p>
            <p>The information contained in our report should be viewed as commercial advertisement and is
                not intended to be investment advice. The website is not provided to any particular individual
                with a view toward their individual circumstances. The information contained in our website is
                not an offer to buy or sell securities. We distribute opinions, comments and information free of
                charge exclusively to individuals who wish to receive them.</p>
            <p>Our website has been prepared for informational purposes only and is not intended to be used
                as a complete source of information on any particular company. An individual should never
                invest in the securities of any of the companies mentioned based solely on information
                contained on our website. Individuals should assume that all information provided regarding
                companies is not trustworthy unless verified by their own independent research.</p>
            <p>Any individual who chooses to invest in any securities should do so with caution. Investing in
                securities is speculative and carries a high degree of risk. You may lose some or all of the
                money that is invested. Always research your own investments, and consult with a registered
                investment advisor or licensed stock broker before investing.</p>
            <p>Any individual who chooses to invest in any securities should do so with caution. Investing in
                securities is speculative and carries a high degree of risk. You may lose some or all of the
                money that is invested. Always research your own investments, and consult with a registered
                investment advisor or licensed stock broker before investing.</p>
            <p>We are committed to providing factual information on the companies that are profiled. However,
                we do not provide any assurance as to the accuracy or completeness of the information
                provided, including information regarding a profiled company’s plans or ability to affect any
                planned or proposed actions. We have no first-hand knowledge of any profiled company’s
                operations and therefore cannot comment on their capabilities, intent, resources, nor experience
                and we make no attempt to do so. Statistical information, dollar amounts, and market size data
                was provided by the subject company and related sources which we believe to be reliable</p>
            <p>To the fullest extent of the law, we will not be liable to any person or entity for the quality,
                accuracy, completeness, reliability, or timeliness of the information provided in the report, or for
                any direct, indirect, consequential, incidental, special or punitive damages that may arise out of
                the use of information we provide to any person or entity (including, but not limited to, lost
                profits, loss of opportunities, trading losses, and damages that may result from any inaccuracy
                or incompleteness of this information). Every trade you make is your own trade and you are fully
                responsible for any gain or loss you shall incur. PutMining.com, nor any moderators are held
                liable for any losses you shall have at any time you are with our service or after. If you do not
                agree with this then do not sign up and leave immediately.</p>
            <p>We encourage you to invest carefully and read investment information available at the websites
                of the SEC at http://www.sec.gov and FINRA at http://www.finra.org.</p>
            <p>IF YOU DO NOT AGREE WITH THE TERMS OF THIS DISCLAIMER, PLEASE EXIT THIS
                SITE IMMEDIATELY. PLEASE BE ADVISED THAT YOUR CONTINUED USE OF THIS SITE
                OR THE INFORMATION PROVIDED HEREIN SHALL INDICATE YOUR CONSENT AND
                AGREEMENT TO THESE TERMS</p>
            ",
        ]);

        DB::table('plans')->insert([
            'title' => 'Starter',
            'subtitle' => 'Stater plan',
            'price' => 20,
            'duration' => '1 month',
            'plus' => '+1 month',
            'type' => 'monthly',
        ]);

        DB::table('plans')->insert([
            'title' => 'Professional',
            'subtitle' => 'Professional plan',
            'price' => 200,
            'duration' => '1 year',
            'plus' => '+1 year',
            'type' => 'annual',
        ]);

        DB::table('plans')->insert([
            'title' => 'Unlimited',
            'subtitle' => 'Unlimited plan',
            'price' => 1000,
            'duration' => 'lifetime',
            'plus' => '+100 year',
            'type' => 'lifetime',
        ]);
    }
}
