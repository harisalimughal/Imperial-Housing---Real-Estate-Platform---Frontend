<?php
// Testimonials data - will be replaced by API when backend is connected
$testimonials = [
    [
        'id' => 1,
        'title' => 'Why Imperial Housing is the right Property managing agency for Birmingham Landlords.',
        'description' => 'As a landlord in Birmingham it can be challenging to manage your rental properties and...',
        'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'property_management',
        'location' => 'Birmingham'
    ],
    [
        'id' => 2,
        'title' => 'Excellent HMO Management Services in Manchester',
        'description' => 'Our comprehensive HMO management has helped landlords increase their rental income by...',
        'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'hmo_management',
        'location' => 'Manchester'
    ],
    [
        'id' => 3,
        'title' => 'Tenant Success Story: Finding the Perfect Home',
        'description' => 'Sarah shares her experience finding quality accommodation through our tenant services...',
        'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'tenant_services',
        'location' => 'Leeds'
    ],
    [
        'id' => 4,
        'title' => 'Complete Property Renovation Project',
        'description' => 'How we transformed this Victorian property into a modern rental investment...',
        'image' => 'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'renovation',
        'location' => 'Birmingham'
    ],
    [
        'id' => 5,
        'title' => 'Landlord Testimonial: 5 Years of Partnership',
        'description' => 'Mark discusses his long-term partnership with Imperial Housing and the benefits...',
        'image' => 'https://images.unsplash.com/photo-1554469384-e58fac16e23a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'landlord_testimonial',
        'location' => 'Birmingham'
    ],
    [
        'id' => 6,
        'title' => 'Professional Property Photography Service',
        'description' => 'See how professional photography increased property viewing requests by 40%...',
        'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'photography',
        'location' => 'Manchester'
    ],
    [
        'id' => 7,
        'title' => 'Emergency Maintenance Response Excellence',
        'description' => 'Our 24/7 emergency response team ensured minimal disruption for both tenant and landlord...',
        'image' => 'https://images.unsplash.com/photo-1515263487990-61b07816b64d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'maintenance',
        'location' => 'Leeds'
    ],
    [
        'id' => 8,
        'title' => 'Student Accommodation Success in Leeds',
        'description' => 'How we helped convert a family home into profitable student accommodation...',
        'image' => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'student_accommodation',
        'location' => 'Leeds'
    ],
    [
        'id' => 9,
        'title' => 'Rent Guarantee Scheme Benefits',
        'description' => 'Learn how our rent guarantee scheme provided peace of mind and steady income...',
        'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'rent_guarantee',
        'location' => 'Birmingham'
    ],
    [
        'id' => 10,
        'title' => 'First-Time Landlord Success Story',
        'description' => 'From property purchase to first tenant - complete guidance for new landlords...',
        'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'landlord_guidance',
        'location' => 'Manchester'
    ],
    [
        'id' => 11,
        'title' => 'Multi-Property Portfolio Management',
        'description' => 'Managing 15 properties across Birmingham - streamlined processes and increased profits...',
        'image' => 'https://images.unsplash.com/photo-1493663284031-b7e3aaa4c4b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'portfolio_management',
        'location' => 'Birmingham'
    ],
    [
        'id' => 12,
        'title' => 'Digital Marketing Success for Property',
        'description' => 'How our digital marketing strategy reduced void periods and increased rental rates...',
        'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'video_url' => '#',
        'category' => 'digital_marketing',
        'location' => 'Leeds'
    ]
];

// Function to get all testimonials (will be replaced by API call)
function getTestimonials() {
    global $testimonials;
    return $testimonials;
}

// Function to get testimonials by category
function getTestimonialsByCategory($category) {
    global $testimonials;
    return array_filter($testimonials, function($testimonial) use ($category) {
        return $testimonial['category'] === $category;
    });
}

// Function to get testimonial by ID
function getTestimonialById($id) {
    global $testimonials;
    foreach ($testimonials as $testimonial) {
        if ($testimonial['id'] == $id) {
            return $testimonial;
        }
    }
    return null;
}