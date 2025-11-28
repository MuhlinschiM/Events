@extends("layout")

@section("main")
    <div class="container mx-auto p-4 mb-4 font-bold"  x-data="{ tab: 'tab1' }">
        <h2 class="text-2xl font-bold">About Us</h2>
        <ul class="flex border-b mt-6">
            <li class="-mb-px mr-1">
                <a class="inline-block rounded-t py-2 px-4 hover:text-orange-800 font-semibold"  href="#" 
                    :class="{ 'bg-gray-700 text-orange-700 border-l border-t border-r': tab == 'tab1'}"
                    @click.prevent="tab = 'tab1'">
                    About Us
                </a>
            </li>
            <li class="-mb-px mr-1">
                <a class="inline-block py-2 px-4 hover:text-orange-800 font-semibold"
                    href="#"
                    :class="{ 'bg-gray-700 text-orange-700 border-l border-t border-r': tab == 'tab2'}"
                    @click.prevent="tab = 'tab2'">
                    Contacts
                </a>
            </li>
            <li class="-mb-px mr-1">
                <a class="inline-block py-2 px-4 hover:text-orange-800 font-semibold"
                    href="#" 
                    :class="{ 'bg-gray-700 text-orange-700 border-l border-t border-r': tab == 'tab3'}"
                    @click.prevent="tab = 'tab3'">
                    Privacy Policy
                </a>
            </li>
        </ul>
        <div class="content px-4 py-4 border-l border-r border-b pt-4" >
            <div x-show="tab == 'tab1'">
                <strong>Why Us?</strong>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                <br>
                <h2>Lorem, ipsum dolor.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
            </div>
            <div x-show="tab == 'tab2'">
                <strong>Address:</strong>
                <p>123 Main Street, Moldova, Chisinau</p>
                <strong>Phone:</strong>
                <p>+1 (123) 456-7890</p>
                <strong>Email:</strong>
                <p>info@events.md</p>
                <strong>Working Hours:</strong>
                <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                <p>Saturday - Sunday: Closed</p>
            </div>
            <div x-show="tab == 'tab3'">
                <a href="#ticket">1. Ticket Terms & Conditions</a>
                <br><br>
                <a href="#terms">2. General Terms</a>
                <br><br>    
                <a href="#use">3. Ticket Use & Entry</a>
                <br><br>
                <h1 id="ticket"><strong>1. Ticket Terms & Conditions</strong></h1>
                <p><em>Last updated: 18 December 2024</em></p>
                <hr>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, accusamus sit, est eaque soluta facilis natus sapiente expedita magnam debitis odit? Alias soluta at perferendis?
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, accusamus sit, est eaque soluta facilis natus sapiente expedita magnam debitis odit? Alias soluta at perferendis?
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, accusamus sit, est eaque soluta facilis natus sapiente expedita magnam debitis odit? Alias soluta at perferendis?
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, accusamus sit, est eaque soluta facilis natus sapiente expedita magnam debitis odit? Alias soluta at perferendis?
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, accusamus sit, est eaque soluta facilis natus sapiente expedita magnam debitis odit? Alias soluta at perferendis?
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, accusamus sit, est eaque soluta facilis natus sapiente expedita magnam debitis odit? Alias soluta at perferendis?
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, accusamus sit, est eaque soluta facilis natus sapiente expedita magnam debitis odit? Alias soluta at perferendis?
                </p>
                <hr>
                <h2 id="terms"><strong>2. General Terms</strong></h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, accusamus sit, est eaque soluta facilis natus sapiente expedita magnam debitis odit? Alias soluta at perferendis?
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, ex magni. Deleniti possimus officia nihil similique saepe obcaecati suscipit et! Aperiam cupiditate quibusdam reprehenderit doloribus eaque illum error minima? Consectetur fugiat iste consequuntur tenetur.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, ex magni. Deleniti possimus officia nihil similique saepe obcaecati suscipit et! Aperiam cupiditate quibusdam reprehenderit doloribus eaque illum error minima? Consectetur fugiat iste consequuntur tenetur.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, ex magni. Deleniti possimus officia nihil similique saepe obcaecati suscipit et! Aperiam cupiditate quibusdam reprehenderit doloribus eaque illum error minima? Consectetur fugiat iste consequuntur tenetur.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, ex magni. Deleniti possimus officia nihil similique saepe obcaecati suscipit et! Aperiam cupiditate quibusdam reprehenderit doloribus eaque illum error minima? Consectetur fugiat iste consequuntur tenetur.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, ex magni. Deleniti possimus officia nihil similique saepe obcaecati suscipit et! Aperiam cupiditate quibusdam reprehenderit doloribus eaque illum error minima? Consectetur fugiat iste consequuntur tenetur.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, ex magni. Deleniti possimus officia nihil similique saepe obcaecati suscipit et! Aperiam cupiditate quibusdam reprehenderit doloribus eaque illum error minima? Consectetur fugiat iste consequuntur tenetur.</p>
                <hr>
                <h2 id="use"><strong>3. Ticket Use & Entry</strong></h2>
                <ol class="list-disc pl-6">
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo, laboriosam.</li>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo, laboriosam.</li>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo, laboriosam.</li>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo, laboriosam.</li>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo, laboriosam.</li>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo, laboriosam.</li>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo, laboriosam.</li>
                </ol>
            </div>

        </div>
    </div>
@endsection