# 🎨 Design System - TechLink Bangladesh E-commerce

## Color Palette

### Primary Colors
- **Primary Black**: `#000000` - Main background
- **Deep Black**: `#0a0a0a` - Secondary background
- **Dark Red**: `#8B0000` - Accent shadows
- **Crimson Red**: `#DC143C` - Primary accent
- **Bright Red**: `#FF0000` - Highlights
- **Neon Red**: `#FF1744` - Interactive elements
- **Star White**: `#ffffff` - Text and borders

### Glassmorphism Effects
- **Glass Background**: `rgba(0, 0, 0, 0.4)` with 20px blur
- **Glass Border**: `rgba(255, 23, 68, 0.2)` - Red tinted borders
- **Shadow Red**: `rgba(220, 20, 60, 0.3)` - Soft shadows
- **Glow Red**: `rgba(255, 23, 68, 0.5)` - Intense glow effects

## Typography

### Font Stack
```css
font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
```

### Heading Styles
- **H1**: 3.8em, gradient text effect with red glow
- **H2**: 2.8em, gradient text with letter spacing
- **H3**: 1.5em, neon red with text shadow

## Components

### Glass Cards
- **Background**: Transparent black with 20px blur
- **Border**: 1px red-tinted border with glow
- **Hover Effect**: Lifts 8px with scale 1.02
- **Shadow**: Multi-layered shadows with red glow
- **Animation**: Smooth shine effect on hover

### Buttons
- **Primary**: Red gradient (Neon → Crimson → Dark)
- **Padding**: 14px 32px
- **Border Radius**: 30px (pill shape)
- **Hover**: Lifts 4px, scales 1.05, ripple effect
- **Shadow**: Red glow intensifies on hover

### Navigation Links
- **Background**: Semi-transparent glass
- **Hover**: Red gradient fills from left
- **Border**: Subtle white border → red on hover
- **Shadow**: Red glow on hover

### Form Inputs
- **Background**: Transparent with blur
- **Border**: White subtle → red on focus
- **Shadow**: Inset shadow + red glow on focus
- **Placeholder**: 40% opacity white

## Effects & Animations

### Glassmorphism
```css
backdrop-filter: blur(20px) saturate(180%);
background: rgba(0, 0, 0, 0.4);
border: 1px solid rgba(255, 23, 68, 0.2);
```

### Hover Animations
- **Transform**: translateY(-8px) scale(1.02)
- **Transition**: 0.4s cubic-bezier(0.4, 0, 0.2, 1)
- **Glow**: 0 → 40px red shadow

### Particle Background
- Red and white particles with twinkling animation
- Radial gradients creating depth
- 40% opacity for subtlety

### Text Gradients
```css
background: linear-gradient(135deg, white, neon-red, bright-red);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
filter: drop-shadow(0 0 30px glow-red);
```

## Special Features

### Custom Scrollbar
- Track: Deep black
- Thumb: Red gradient with glow on hover
- Border radius: 10px

### Selection Highlight
- Background: Neon red
- Text: White

### Loading Spinner
- Border: Red gradient
- Animation: 1s infinite spin

### Badges & Alerts
- Glass background with blur
- Color-coded borders (red, green, yellow)
- Subtle shadows

## Responsive Design

### Breakpoints
- **Mobile**: < 768px
  - Single column layouts
  - Stacked navigation
  - Smaller font sizes

### Mobile Optimizations
- Touch-friendly button sizes (min 44px)
- Simplified animations
- Optimized blur effects

## Usage Guidelines

### Do's ✅
- Use glassmorphism for all card elements
- Apply red glow to interactive elements
- Maintain high contrast for readability
- Use smooth, eased transitions
- Layer shadows for depth

### Don'ts ❌
- Don't use solid backgrounds (keep transparency)
- Avoid mixing other color schemes
- Don't over-blur (max 20px)
- Don't use harsh transitions
- Avoid cluttered layouts

## Accessibility

- **Contrast Ratio**: Minimum 4.5:1 for text
- **Focus States**: Clear red borders on focus
- **Hover States**: Visual feedback on all interactive elements
- **Text Size**: Minimum 16px for body text
- **Touch Targets**: Minimum 44x44px for mobile

## Performance

- **Backdrop Filter**: Hardware accelerated
- **Animations**: GPU-optimized transforms
- **Blur Radius**: Optimized at 20px max
- **Transitions**: CSS-based, no JavaScript

---

**Last Updated**: 2025-10-17
**Version**: 2.0.0 - Professional Red & Black Glassmorphism Theme
